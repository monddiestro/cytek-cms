<div class="cytek-main">
    <div class="wrapper">
        <div class="page-wrapper">
            <div class="container px-5 pt-5">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="header-text header-mt">
                        <span class="text-primary"><a href="<?php echo base_url('admin/leads') ?>"><i class="fas fa-angle-left mr-2"></i></a></span>
                        <span><?php echo $detail["name"] ?></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Email:</label> <span><?php echo $detail["email"] ?></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Contact Number:</label> <span><?php echo $detail["contact"] ?></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Company Name:</label> <span><?php echo $detail["company"] ?></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Department:</label> <span><?php echo $detail["department"] ?></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Position:</label> <span><?php echo $detail["position"] ?></span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Lead Source:</label> <span><?php echo $detail["source"] ?></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Message:</label>
                                            <p><?php echo $detail["message"] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>