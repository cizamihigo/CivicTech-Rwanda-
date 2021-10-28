<?php
    include("includes/head.php");
    include("includes/db.php");

    require_once('recap/autoload.php');
    //$recaptcha = new \ReCaptcha\ReCaptcha($secret);

?>
<?php
    if(isset($_POST['submit']))
    {
        if(isset($_POST["g-recaptcha-response"]))
        {
            $recaptcha = new \ReCaptcha\ReCaptcha('6LcHvfQcAAAAACuL72kvaoeIsjTwEzJ-CCwElM2A');
            $resp = $recaptcha->verify($_POST["g-recaptcha-response"]);
            if ($resp->isSuccess()) {
                // Verified!
                //echo("Valid");
                if(isset($_POST['report']))
                {
                    $var = $_POST['report'];
                    $session = $_SESSION['id'];
                    $date = date('Y-m-d');

                    $asq = "INSERT INTO t_monitoring(`U_id`, `M_text`, `Date`) VALUES('$session', '$var' , '$date')";
                    $exe = mysqli_query($connect, $asq);
                    if($exe)
                    {
                        ?>
                        <script>
                            alert("Inserted successfully");
                            window.location.href = "feed.php";
                        </script>
                        <?php
                    }
                }

            } else {
                $errors = $resp->getErrorCodes();
                echo("Invalid");
                //($errors);
            }
        }
        else
        {
            var_dump("captcha non rempli");
        }
    }


?>
<section>
    <div class="gap gray-bg">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row" id="page-contents">
                        <div class="col-lg-3">
                            <aside class="sidebar static">
                                <?php include("includes/shortcut.php"); ?>									
                            </aside>
                        </div><!-- sidebar -->
                        <div class="col-lg-6">
                            <div class="central-meta">
                                <div class="editing-info">
                                    <h5 class="f-title"><i class="ti-book"></i>Report an issue</h5>
                                    
                                    <form method="post" action="">
                                        <div class="form-group">
                                            <textarea  name='report' id="input" required="required"></textarea>
                                            <label class="control-label" for="input">What are your complaints : give brief details</label><i class="mtrl-select"></i>
                                        </div>
                                        <div>
                                        <script src="https://www.google.com/recaptcha/api.js"></script>
                                        <script>
                                            function onSubmit(token) {
                                                document.getElementById("demo-form").submit();
                                            }
                                        </script>
                                        <div class="g-recaptcha" data-sitekey="6LcHvfQcAAAAAGaA0LIQKtO6KHMORoU5jyhliU75" 
                                            ></div>

                                        </div>
                                        <div class="submit-btns">
                                            <button type="submit" name="submit" class="mtr-btn"><span>Upload</span></button>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>	
                        </div><!-- centerl meta -->
                        <div class="col-lg-3">
                            <aside class="sidebar static">
                                <?php
                                    include("includes/onlinefriends.php");
                                ?>  
                            </aside>
                        </div><!-- sidebar -->
                    </div>	
                </div>
            </div>
        </div>
    </div>	
</section>
