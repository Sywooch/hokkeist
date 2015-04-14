<div id="main-news-container">
    <div id="main-news">
        <?php
        for ($i = 0; $i < count($model); $i++) {
            echo $this->render('_item', ['model' => $model[$i], 'i' => $i]);
        }
        ?>
    </div>
    <div id="main-news-list">
        <ul>
            <?php
            for ($i = 0; $i < count($model); $i++) {
                echo $this->render('_item_list', ['model' => $model[$i], 'i' => $i]);
            }
            ?>
        </ul>
    </div>
    <div class="clearfix"></div>
</div>