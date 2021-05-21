<?php
$title = "商品列表";
$pageName = "product-list";


require __DIR__ . '/product/__connect_db.php';
$searchString = "1 ";
$page = isset($_GET['page']) ? intval($_GET['page']) - 1 : 0;
if ($_GET != null) {
    unset($_GET['page']);
    foreach ($_GET as $key => $value) {
        $searchString .= ' and ' . $key . '= "' . $value . '"';
    }
}
// SELECT * FROM `shop` WHERE 1 ORDER BY Popularity_shop DESC LIMIT 12 OFFSET 2
$c_sql = "SELECT * FROM shop WHERE " . $searchString . " ORDER BY Popularity_shop DESC LIMIT 12 OFFSET " . $page * 12;
$product = $pdo->query($c_sql)->fetchAll();
// $sql01 = "SELECT * FROM shop ORDER BY Popularity_shop ASC";小到大
$sql02 = "SELECT * FROM shop ORDER BY Popularity_shop DESC"; //大到小
// $product = $pdo->query($sql02)->fetchAll();
// SELECT * FROM shop ORDER BY Popularity_shop DESC

// $data = mysql_query("SELECT * FROM DBNAME ORDER BY name ASC")
// $data = mysql_query("SELECT * FROM DBNAME ORDER BY Popularity_shop");
// $result = $pdo->query($sql)->fetchAll();
// ORDER BY "?Popularity_shop=" [DESC];


// 分類
// $c_sql = "SELECT * FROM categories WHERE parent_sid=0";
// $cate_rows = $pdo->query($c_sql)->fetchAll();

// $cate = isset($_GET['cate']) ? intval($_GET['cate']) : 0;
// $qs = [];
// $where = ' WHERE 1 ';
// if (!empty($cate)) {
//     $where .= " AND category_sid=$cate ";
//     $qs['cate'] = $cate;
// }

// SELECT * FROM `poetry` ORDER BY RAND() LIMIT 1

//取得總筆數, 總頁數, 該頁的商品資料

// $perPage = 12; // 每一頁有幾筆
// $page = isset($_GET['page']) ? intval($_GET['page']) : 1; // 用戶要看第幾頁的商品

// $t_sql = "SELECT COUNT(1) FROM product $where ";
// $totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0]; //拿到總共有幾筆
// $totalPages = ceil($totalRows / $perPage); //總共有幾頁
// ceil()無條件進位
// ??
// if($page<1) $page=1;
// if($page>$totalPages) $page=$totalPages;

// $p_sql = sprintf("SELECT * FROM product $where LIMIT %s, %s ", ($page - 1) * $perPage, $perPage);

// $rows = $pdo->query($p_sql)->fetchAll();


// echo json_encode([
//         'perPage' => $perPage,
//         'cate' => $cate,
//         'page' => $page,
//         'totalRows' => $totalRows,
//         'totalPages' => $totalPages,
//         'rows' => $rows,

// ], JSON_UNESCAPED_UNICODE);
?>
<?php include __DIR__ . '/product/head.php'; ?>

<body>
    <?php include __DIR__ . '/product/navber.php'; ?>
    <div class=" container-fluid shop_body_outer p-0">
        <div class="shop_top100 shop_container container-fluid">
            <nav aria-label="breadcrumb ">
                <ol class="breadcrumb bg-transparent pl-1 ">
                    <li class="breadcrumb-item"><a href="#">SHOP / 商店</a></li>
                    <i class="fas fa-chevron-right"></i>配件飾品</li>
                </ol>
            </nav>
            <div class="shop_phone_button">
                <!-- <button class="shop_phone_btn">熱門商品</button>
                <button class="shop_phone_btn">聯名合作</button> -->
                <!-- <button class="shop_phone_btn">商品分類</button> -->
                <select class="shop_phone_btn">
                    <option value="">商品分類</option>
                    <option value="Categories=線香">線香</option>
                    <option>飾品</option>
                    <option>服飾</option>
                    <option>平安符</option>
                    <option>聯名合作</option>
                    <option>熱門商品</option>
                </select>
                <!-- <button class="shop_phone_btn">價錢範圍</button> -->

                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    價錢範圍
                </button>
            </div>

            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    <div>
                        <input id="ex8" data-slider-id='trip_price_range8' type="text" data-slider-min="0" data-slider-max="10000" data-slider-step="100" data-slider-value="5000" />
                    </div>
                </div>
            </div>
            <div class="d-flex">
                <div class="shop_General p-0">
                    <!-- col-lg-2 -->
                    <!-- shop_pl_120 -->
                    <div class="shop_magnifier">
                        <div class="shop_search01 position-relative mb-5 ">
                            <input type="text" class=" form-control border-0 bg-transparent px-1" id="formGroupExampleInput" placeholder="找商品...">
                            <i class="fa fa-search fa-lg"></i>
                        </div>
                        <div class="d-none ">
                            <div class="rounded-circle"><i class="far fa-heart rounded-circle p-2" style="background-color: #FFF; color:red;"></i></div>
                        </div>
                        <div class="trip_category ">
                            <h3 class="py-2">商品分類 |</h3>
                            <ul>
                                <li class="py-1 shop_effect" data-p="Categories=線香">線香</li>
                                <li class="py-1 shop_effect" data-p="Categories=飾品">飾品</li>
                                <li class="py-1 shop_effect" data-p="Categories=擺飾">擺飾</li>
                                <li class="py-1 shop_effect" data-p="Categories=平安符">平安符</li>
                                <li class="py-1 shop_effect" data-p="Joint_Popular=聯名合作">聯名合作</li>
                                <li class="py-1 shop_effect" data-p="Joint_Popular=熱門商品">熱門商品</li>
                            </ul>
                            <ul>
                                <li class="py-1 ">
                                    <!-- mt-5 -->
                                    <h3 class='mb-2'>價錢範圍 |</h3>
                                    <div>
                                        <input id="ex9" data-slider-id='trip_price_range8' type="text" data-slider-min="0" data-slider-max="10000" data-slider-step="100" data-slider-value="5000" />
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="shop_body01 col-lg-8 p-0">

                    <div class="row shop_Separate ">

                        <div class="shop_Displacement d-flex mb-5 display_none  col p-0">
                            <div class="shop_h3 display_none">
                                <h4>配件飾品 | Accessories</h4>
                            </div>
                            <div class="form-inline display_none">
                                <label class="pr-3" for="exampleFormControlSelect1">排序方式</label>
                                <select class="form-control bg-transparent" id="exampleFormControlSelect1" onselect="alert(777)">
                                    <option>請選擇</option>
                                    <option>人氣推薦</option>
                                    <option>評價最高</option>
                                    <option>價格(從低到高)</option>
                                </select>
                            </div>
                        </div>
                        <div class="container-flow ">
                            <div class="row col shop_body">
                                <?php foreach ($product as $value) : ?>

                                    <div class=" shop_card_body p-0" data-sid="<?= $value['sid'] ?>">
                                        <a href="./shop_page.php">
                                            <div class="shop_fff">
                                                <div class="  shop_card_img  ">
                                                    <div class="shop_icon"><i class="far fa-heart"></i></div>
                                                    <img class="shop_Scaling" src="./img/shop/shop_new/shop_1~25_new/<?= $value['img1'] ?>" alt="">
                                                </div>
                                                <div class="shop_card-text_body" id="shop_card_text_body">
                                                    <h5 class="shop_card-title" id="shop_cad_title"><?= $value['CommodityName_bigLabel'] ?></h5>
                                                    <div class="shop_card-text">
                                                        <p class="m-0 shop_txt"><?= $value['Commodity_name_smallLabel'] ?></p>
                                                        <p class="shop_m0">NTD <?= $value['price'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                <?php endforeach; ?>
                                <!-- <div class=" shop_card_body p-0">
                                    <div class="shop_fff">
                                        <div class="  shop_card_img  ">
                                            <div class="shop_icon"><i class="far fa-heart"></i></div>
                                            <img class="shop_Scaling" src="./img/shop/shop_new/shop_1~25_new/sh_0101.png" alt="">
                                        </div>
                                        <div class="shop_card-text_body">
                                            <h5 class="shop_card-title">大甲鎮瀾宮 錢龜</h5>
                                            <div class="shop_card-text">
                                                <p class="m-0 shop_txt">『2021牛年-大甲鎮瀾宫－守財錢龜』</p>
                                                <p class="shop_m0">NTD 399</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" shop_card_body p-0">
                                    <div class="shop_fff">
                                        <div class="  shop_card_img  ">
                                            <div class="shop_icon"><i class="far fa-heart"></i></div>
                                            <img class="shop_Scaling" src="./img/shop/shop_new/shop_1~25_new/sh_0201.png" alt="">
                                        </div>
                                        <div class="shop_card-text_body">
                                            <h5 class="shop_card-title">大甲鎮瀾宮 錢龜</h5>
                                            <div class="shop_card-text">
                                                <p class="m-0 shop_txt">『2021牛年-大甲鎮瀾宫－守財錢龜』</p>
                                                <p class="shop_m0">NTD 399</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" shop_card_body p-0">
                                    <div class="shop_fff">
                                        <div class="  shop_card_img  ">
                                            <div class="shop_icon"><i class="far fa-heart"></i></div>
                                            <img class="shop_Scaling" src="./img/shop/shop_new/shop_1~25_new/sh_0301.png" alt="">
                                        </div>
                                        <div class="shop_card-text_body">
                                            <h5 class="shop_card-title">牛轉錢坤</h5>
                                            <div class="shop_card-text">
                                                <p class="m-0 shop_txt">大甲鎮瀾宮牛轉錢坤平安符 (烈炎紅)</p>
                                                <p class="shop_m0">NTD 399</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- ----------------------------------------- -/->
                                <div class=" shop_card_body p-0">
                                    <div class="shop_fff">
                                        <div class="  shop_card_img  ">
                                            <div class="shop_icon"><i class="far fa-heart"></i></div>
                                            <img class="shop_Scaling" src="./img/shop/shop_new/shop_1~25_new/sh_0401.png" alt="">
                                        </div>
                                        <div class="shop_card-text_body">
                                            <h5 class="shop_card-title">大甲鎮瀾宮 錢龜</h5>
                                            <div class="shop_card-text">
                                                <p class="m-0 shop_txt">『2021牛年-大甲鎮瀾宫－守財錢龜』</p>
                                                <p class="shop_m0">NTD 399</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class=" shop_card_body p-0">
                                    <div class="shop_fff">
                                        <div class="  shop_card_img  ">
                                            <div class="shop_icon"><i class="far fa-heart"></i></div>
                                            <img class="shop_Scaling" src="./img/shop/shop_new/shop_1~25_new/sh_0501.png" alt="">
                                        </div>
                                        <div class="shop_card-text_body">
                                            <h5 class="shop_card-title">福壽安康</h5>
                                            <div class="shop_card-text">
                                                <p class="m-0 shop_txt">大甲鎮瀾宮福壽安康平安符 (岩灰)</p>
                                                <p class="shop_m0">NTD 399</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class=" shop_card_body p-0">
                                    <div class="shop_fff">
                                        <div class="  shop_card_img  ">
                                            <div class="shop_icon"><i class="far fa-heart"></i></div>
                                            <img class="shop_Scaling" src="./img/shop/shop_new/shop_1~25_new/sh_0601.png" alt="">
                                        </div>
                                        <div class="shop_card-text_body">
                                            <h5 class="shop_card-title">百子圖開</h5>
                                            <div class="shop_card-text">
                                                <p class="m-0 shop_txt">大甲鎮瀾宮百子圖開平安符 (百合綠)</p>
                                                <p class="shop_m0">NTD 399</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- ----------------------------------------- -/->
                                <div class="shop_card_body p-0">
                                    <div class="shop_fff">
                                        <div class="  shop_card_img  ">
                                            <div class="shop_icon"><i class="far fa-heart"></i></div>
                                            <img class="shop_Scaling" src="./img/shop/shop_new/shop_1~25_new/sh_0701.png" alt="">
                                        </div>
                                        <div class="shop_card-text_body">
                                            <h5 class="shop_card-title">鴻圖大展</h5>
                                            <div class="shop_card-text">
                                                <p class="m-0 shop_txt">大甲鎮瀾宮鴻圖大展平安符 (南瓜橘)</p>
                                                <p class="shop_m0">NTD 399</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" shop_card_body p-0">
                                    <div class="shop_fff">
                                        <div class="  shop_card_img  ">
                                            <div class="shop_icon"><i class="far fa-heart"></i></div>
                                            <img class="shop_Scaling" src="./img/shop/shop_new/shop_1~25_new/sh_0801.png" alt="">
                                        </div>
                                        <div class="shop_card-text_body">
                                            <h5 class="shop_card-title">桃紅柳綠</h5>
                                            <div class="shop_card-text">
                                                <p class="m-0 shop_txt">大甲鎮瀾宮桃紅柳綠平安符 (大象灰)</p>
                                                <p class="shop_m0">NTD 399</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" shop_card_body p-0">
                                    <div class="shop_fff">
                                        <div class="  shop_card_img  ">
                                            <div class="shop_icon"><i class="far fa-heart"></i></div>
                                            <img class="shop_Scaling" src="./img/shop/shop_new/shop_1~25_new/sh_0901.png" alt="">
                                        </div>
                                        <div class="shop_card-text_body">
                                            <h5 class="shop_card-title">路隨福行</h5>
                                            <div class="shop_card-text">
                                                <p class="m-0 shop_txt">大甲鎮瀾宮路隨福行平安符 (黑藍)</p>
                                                <p class="shop_m0">NTD 399</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ------------------------------ -/->
                                <div class=" shop_card_body p-0">
                                    <div class="shop_fff">
                                        <div class="  shop_card_img  ">
                                            <div class="shop_icon"><i class="far fa-heart"></i></div>
                                            <img class="shop_Scaling" src="./img/shop/shop_new/shop_1~25_new/sh_1001.png" alt="">
                                        </div>
                                        <div class="shop_card-text_body">
                                            <h5 class="shop_card-title">奎星高照</h5>
                                            <div class="shop_card-text">
                                                <p class="m-0 shop_txt">大甲鎮瀾宮奎星高照平安符 (竹青綠)</p>
                                                <p class="shop_m0">NTD 399</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" shop_card_body p-0">
                                    <div class="shop_fff">
                                        <div class="  shop_card_img  ">
                                            <div class="shop_icon"><i class="far fa-heart"></i></div>
                                            <img class="shop_Scaling" src="./img/shop/shop_new/shop_1~25_new/sh_1101.png" alt="">
                                        </div>
                                        <div class="shop_card-text_body">
                                            <h5 class="shop_card-title">開運祈福</h5>
                                            <div class="shop_card-text">
                                                <p class="m-0 shop_txt">開運祈福貔貅系列_彩色碧璽手鍊</p>
                                                <p class="shop_m0">NTD 1280</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" shop_card_body p-0">
                                    <div class="shop_fff">
                                        <div class="  shop_card_img  ">
                                            <div class="shop_icon"><i class="far fa-heart"></i></div>
                                            <img class="shop_Scaling" src="./img/shop/shop_new/shop_1~25_new/sh_1201.png" alt="">
                                        </div>
                                        <div class="shop_card-text_body">
                                            <h5 class="shop_card-title">開運祈福</h5>
                                            <div class="shop_card-text">
                                                <p class="m-0 shop_txt">開運祈福貔貅系列_黑曜石手鍊</p>
                                                <p class="shop_m0">NTD 1380</p>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->






                            </div>

                        </div>
                        <nav class="shop_page " aria-label="Page navigation example">
                            <!-- ml-10 -->
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link shop_page-item" value="1">1</a></li>
                                <li class="page-item"><a class="page-link shop_page-item" value="2">2</a></li>
                                <li class="page-item"><a class="page-link shop_page-item" value="3">3</a></li>
                                <li class="page-item"><a class="page-link shop_page-item" value="4">4</a></li>
                                <li class="page-item"><a class="page-link shop_page-item" value="5">5</a></li>
                            </ul>
                        </nav>
                    </div>


                </div>
            </div>
        </div>
        <!-- <div class="r0 ">
            <a href="javascript:top0();"><img class="top0" src="./img/arrow-top01.svg" alt=""></a>
        </div> -->
    </div>
    <?php include __DIR__ . '/product/footer.php'; ?>
    <?php include __DIR__ . '/product/script.php'; ?>
</body>