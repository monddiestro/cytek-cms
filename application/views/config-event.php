<div class="cytek-main">
    <div class="wrapper">
        <div id="page-content-wrapper">
            <div class="container px-5">
                <ol class="breadcrumb pt-5">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin') ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/events') ?>">Events</a></li>
                    <li class="breadcrumb-item active"><?php echo ucwords($event["title"])?></li>
                </ol>
                <?php echo form_open_multipart(base_url('admin/modify_event')) ?>
                <input type="hidden" value="<?php echo $event["event_id"] ?>" name="event_id">
                <div class="row mt-3">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <img style="width:100%" class="media-object" src="<?php echo base_url($event["img"]) ?>" alt="">
                            <br/>
                            <br/>
                            <span class="form-label">Change Featured Image</span>
                            <br/>
                            <label class="btn btn-default shadow" id="btn_browse">
                                <input type="file" name="meta_img" accept="image/*" style="display:none;">
                                BROWSE
                            </label>&nbsp;&nbsp;<span class="text-muted filename small">No image selected</span>
                        </div>
                        <div class="form-group">
                            <label>Date</label>
                            <input type="text" value="<?php echo date('m/d/Y',strtotime($event["event_date"])) ?>" autocomplete="off" name="date" class="form-control" placeholder="MM/DD/YY" id="date">
                        </div>
                        <div class="form-group">
                            <label for="">Title</label>
                            <input class="form-control" type="text" name="title" value="<?php echo $event["title"] ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea rows="15" class="form-control" name="description"><?php echo $event["description"] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Keyword</label>
                            <input class="form-control" type="text" name="keyword" value="<?php echo $event["keyword"] ?>"/>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Content</label>
                            <textarea class="form-control" name="content" id="" cols="30" rows="50"><?php echo $event["content"] ?></textarea>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">Update Event</button>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>