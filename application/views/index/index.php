<?php if (isset($exception)): ?>
    <div class="row">
        <div class="col-md-12">
            <div id="exception" class="alert alert-danger">
                <p><?php echo $exception; ?></p>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="row">
        <div class="col-md-12">
            <div id="message" class="alert alert-warning">
                <p><?php echo $message; ?></p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form id="transcoder" name="transcoder" action="" method="post">
                <textarea id="input" name="input"><?php echo isset($input) ? $input : ""; ?></textarea>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                          <span class="sr-only">Toggle navigation</span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                        </button>
                        <div class="navbar-brand hidden-xs">Code</div>
                        <div class="navbar-brand visible-xs"><?php echo ($code == "") ? "Morse" : $code; ?></div>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li <?php echo ($code == "Morse" || $code == "") ? "class='active'" : ""; ?>><a href="?code=Morse">Morse</a></li>
                            <li <?php echo ($code == "Baudot") ? "class='active'" : ""; ?>><a href="?code=Baudot">Baudot</a></li>
                            <li <?php echo ($code == "RADIX-50") ? "class='active'" : ""; ?>><a href="?code=RADIX-50">RADIX-50</a></li>
                            <li <?php echo ($code == "Sixbit") ? "class='active'" : ""; ?>><a href="?code=Sixbit">Sixbit</a></li>
                            <li <?php echo ($code == "ASCII") ? "class='active'" : ""; ?>><a href="?code=ASCII">ASCII</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div id="result" class="well"><?php echo isset($result) ? $result : ""; ?></div>
        </div>
    </div>
<?php endif; ?>