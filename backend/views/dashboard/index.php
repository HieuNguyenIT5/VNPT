<?php

use miloschuman\highcharts\Highcharts;
echo Highcharts::widget([
    'options'=>'{
       "title": { "text": "Tổng số sản phẩm đã bán trong năm" },
       "xAxis": {
          "categories": ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"]
       },
       "yAxis": {
          "title": { "text": "Số lượng bán" }
       },
       "series": [
          { "name": "Số đơn hàng", "data": [1, 20, 41,15,16,35,16,45] },
          { "name": "Số đơn hàng thành công", "data": [1, 20,40, 15, 15, 32, 16,40] }
       ]
    }'
 ]);
 echo Highcharts::widget([
    'options'=>'{
       "title": { "text": "Doanh số theo tưng tháng trong năm" },
       "xAxis": {
          "categories": ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"]
       },
       "yAxis": {
          "title": { "text": "Doanh số" }
       },
       "series": [
          { "name": "Doanh số", "data": [10000000, 200000000, 412000000,120000000,180000000,280000000,160000000,425000000] }
       ]
    }'
 ]);