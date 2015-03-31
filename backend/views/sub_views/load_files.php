<legend>Загрузка файлов</legend>
<blockquote class="f-s-14">
    <p>Вы можете загрузить сюда необходимые документы.</p>
</blockquote>
<form enctype="multipart/form-data" method="POST" action="assets/global/plugins/jquery-file-upload/server/php/" id="fileupload" class="">
    <div class="row fileupload-buttonbar">
        <div class="col-md-7">
            <span class="btn btn-success fileinput-button">
                <i class="fa fa-plus"></i>
                <span>Add files...</span>
                <input type="file" multiple="" name="files[]">
            </span>
            <button class="btn btn-primary start" type="submit">
                <i class="fa fa-upload"></i>
                <span>Start upload</span>
            </button>
            <button class="btn btn-warning cancel" type="reset">
                <i class="fa fa-ban"></i>
                <span>Cancel upload</span>
            </button>
            <button class="btn btn-danger delete" type="button">
                <i class="glyphicon glyphicon-trash"></i>
                <span>Delete</span>
            </button>
            <!-- The global file processing state -->
            <span class="fileupload-process"></span>
        </div>
        <!-- The global progress state -->
        <div class="col-md-5 fileupload-progress fade">
            <!-- The global progress bar -->
            <div aria-valuemax="100" aria-valuemin="0" role="progressbar" class="progress progress-striped active">
                <div style="width:0%;" class="progress-bar progress-bar-success"></div>
            </div>
            <!-- The extended global progress state -->
            <div class="progress-extended">&nbsp;</div>
        </div>
    </div>
    <!-- The table listing the files available for upload/download -->
    <table class="table table-striped" role="presentation"><tbody class="files"></tbody></table>
    <div class="alert alert-danger">Upload server currently unavailable - Wed Feb 25 2015 15:19:49 GMT+0500 (YEKT)</div></form>