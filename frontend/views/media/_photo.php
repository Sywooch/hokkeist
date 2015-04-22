<div class="col-lg-2">
    <a title="<?= $photo->title ? $photo->title : $model->name ?>" href="<?= $model->galleryUrl . $model->id . '/5' . substr($photo->filename, 1)  ?>" class="fv-title group1 cboxElement">

        <img width="114" height="68" alt="" src="<?= $model->galleryUrl . $model->id . '/' . $photo->filename ?>"> 
        <!--<div class="fm-hover media"></div>-->
    </a>
</div>
