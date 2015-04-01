<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>


                        

<h1>Новости</h1>
<div class="news-list-all">
<?php foreach($model as $item): ?>
	<?= $link = ['article/view','category' => $category->alias,'id' => $item->id] ?>
	<div class="col-xs-12 no-padding" id="bx_3218110189_12">
		<div class="col-xs-3 no-padding">
						<a href="<?= Url::to($link) ?>">
				<div title="" style="background:url('/upload/iblock/3cd/3cd9ad89d14ab7be0257c2d51933ca5e.jpg') no-repeat; width: 125px; height: 70px; background-size: cover;"></div>
			</a>
					</div>
		<div class="col-xs-9 no-padding">
			<span class="sub-title">29 Августа 2014</span>
				<h2>
					<?= Html::a($model->title,$link); ?>
				</h2>
		</div>
		<div style="clear:both"></div>
	</div>
	<?php endforeach; ?>
 </div>