pcb-kingdee
================================

## 安装

```sh
composer require pcb-plus/pcb-kingdee
```

## 用例

1. 查询用户

```php
use PcbPlus\PcbKingdee\Client;
use PcbPlus\PcbKingdee\Query\Criteria;
use PcbPlus\PcbKingdee\Services\UserService;

$client = new Client($config);
$client->setCache($cache);
$client->setHttp($http);

$service = new UserService($client);
$criteria = Criteria::make()->addFilterLike('name', '刘')->forPage($page);
$result = $service->startSession('demo')->paginateEntities($criteria);

var_dump($result->toArray());
```

2. 保存其他入库单

```php
use PcbPlus\PcbKingdee\Flex\StockLocation;
use PcbPlus\PcbKingdee\Services\MiscellaneousService;

$service = new MiscellaneousService($client);

$result = $service->startSession('demo')->saveBill([
    'stock_direct' => $data['stock_direct'],
    'date' => date('Y-m-d H:i:s'),
    'stock_org_number' => $data['stock_org_number'],
    'owner_type_id_head' => $data['owner_type_id_head'],
    'owner_number_head' => $data['owner_number_head'],
    'note' => $data['note'],
    'entries' => array_map(function ($entry) {
        return array_merge(
            [
                'material_number' => $entry['material_number'],
                'qty' => $entry['qty'],
                'unit_number' => $entry['unit_number'],
                'stock_number' => $entry['stock_number'],
            ],
            StockLocation::parseNumberToArray($entry['stock_loc_number']),
            [
                'lot_number' => $entry['lot_number'],
                'keeper_type_id' => $entry['keeper_type_id'],
                'keeper_number' => $entry['keeper_number'],
            ]
        );
    }, $data['entries']),
]);

var_dump($result->toArray());
```

3. 下推其生产用料清单为生产领料单并保存

```php
use PcbPlus\PcbKingdee\Models\PickMtrl;
use PcbPlus\PcbKingdee\Services\PPBomService;

$service = new PPBomService($client);

$result = $service->startSession('demo')->push([
    'entry_ids' => $data['entry_ids'],
    'rule_id' => $config['rule_id'],
    'target_form_id' => PickMtrl::DOMAIN_NAME,
    'is_enable_default_rule' => false,
    'is_draft_when_save_fail' => true,
    'custom_params' => [
        'ppbom_rows' => array_map(function ($row) {
            return [
                'entry_id' => $row['entry_id'],
                'app_qty' => $row['app_qty'],
                'base_app_qty' => $row['base_app_qty'],
                'inventories' => array_map(function ($inventory) {
                    return [
                        'material_id' => $inventory['material_id'],
                        'material_number' => $inventory['material_number'],
                        'stock_id' => $inventory['stock_id'],
                        'stock_number' => $inventory['stock_number'],
                        'stock_loc_id' => $inventory['stock_loc_id'],
                        'stock_loc_number' => $inventory['stock_loc_number'],
                        'lot_id' => $inventory['lot_id'],
                        'lot_number' => $inventory['lot_number'],
                        'unit_id' => $inventory['unit_id'],
                        'unit_number' => $inventory['unit_number'],
                        'actual_qty' => $inventory['actual_qty'],
                        'base_actual_qty' => $inventory['base_actual_qty'],
                    ];
                }, $row['inventories']),
            ];
        }, $data['rows']),
    ],
]);

var_dump($result->toArray());
```
