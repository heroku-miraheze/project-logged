<?php

define('APP', dirname(__FILE__));
require APP.'/app/config.php';

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title><?=$final['title']['signup'];?> - <?=$final['company_name'];?></title>
        <link rel="icon" href="/favicon.ico" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
        <link href="/auth/assets/style.css" rel="stylesheet">
    </head>
    <script type="text/javascript">const LOGGED_DOM = '<?=$final['placeholders']['signup']['subdomain'];?>';</script>
    <body class="login-page">
        <div class="login-box">
            <a href="<?=$final['main_site'];?>">
                <p style="text-align:center">
                	<img src="<?=$final['logo'];?>" alt="<?=$final['company_name'];?> logo"/>
                </p>
            </a>
            <div class="card">
                <div class="body">
                    <div class="msg"><?=$final['msg']['signup'];?></div>
                    <form action="<?=$final['submit']['signup'];?>" onsubmit="return submitHandler()" method="post">
                    	<div class="input-group">
						    <span class="input-group-addon">
						    <i class="material-icons">person</i>
						    </span>
						    <div class="form-line">
						    	<input type="text" name="username" class="form-control" placeholder="your-name.<?=$final['placeholders']['signup']['subdomain'];?>" onkeyup="domainInfo(this.value)" onblur="domainInfo(this.value, true)" id="lg-username" autocomplete="off">
						    </div>
						    <small class="col-blue i8bEK" id="sub_info">{{MESSAGE}}</small>
						    <small class="col-pink i8bEK" id="warn_username">{{WARNING}}</small>
						</div>
						<div class="input-group">
						    <span class="input-group-addon">
						    <i class="material-icons">email</i>
						    </span>
						    <div class="form-line">
						        <input type="email" name="email" class="form-control" placeholder="Email address" id="lg-email">
						    </div>
						    <small class="col-pink i8bEK" id="warn_email">{{WARNING}}</small>
						</div>
						<div class="input-group">
						    <span class="input-group-addon">
						    <i class="material-icons">lock</i>
						    </span>
						    <div class="form-line">
						        <input type="password" name="password" class="form-control" placeholder="Password" id="lg-password">
						    </div>
						    <small class="col-pink i8bEK" id="warn_password">{{WARNING}}</small>
						</div>
						<div class="input-group">
						    <span class="input-group-addon">
						    <i class="material-icons">lock</i>
						    </span>
						    <div class="form-line">
						        <input type="password" name="password_confirm" class="form-control" placeholder="Confirm password" id="lg-password-confirm">
						    </div>
						    <small class="col-pink i8bEK" id="warn_password_confirm">{{WARNING}}</small>
						</div>
						<div class="form-line">
						    <input type="hidden" name="id" value="<?=$x[1];?>">
						    <div>
						    	<img width="320px" height="90px" src="https://securesignup.net/image.php?id=<?=$x[1];?>">
						    </div>
						    <br/>
						    <div class="input-group">
						        <span class="input-group-addon">
						        <i class="material-icons">lock</i>
						        </span> 
						        <div class="form-line">
						        	<input type="text" class="form-control" name="number" placeholder="Captcha" id="lg-captcha">
						        </div>
						        <small class="col-pink i8bEK" id="warn_captcha">{{WARNING}}</small>
						    </div>
						</div>
						<p>By signing up, you accept and agree to our <a href="<?=$final['base'];?>/terms.php">terms of service</a> and <a href="<?=$final['base'];?>/privacy.php">privacy policies</a>.</p>
						<input type="hidden" name="submit" value="Register">
                        <div class="row">
                            <div class="col-xs-12">
                                <button class="btn btn-block bg-<?=$final['color'];?> waves-effect">SIGN UP</button>
                            </div>
                            <div class="m-t-25 m-b--5 align-center">
							    <a href="<?=$final['base'];?>/login.php">Registered User? Click here to Login!</a>
							</div>
                        </div>
                        <script src="/auth/assets/material.js"></script>
                        <script type="text/javascript">
                        	function z(o){
                        		return document.getElementById(o);
                        	}
                        	function ok(y, u){
                        		y.style.display = 'none';
								u.remove('error');
								u.add('success');
								u.add('focused');
                        	}
                        	function warn(y, u){
                        		y.style.display = 'block';
								u.remove('success');
								u.add('error');
								u.add('focused');
                        	}
                        	function domainInfo(sub, check=false){
                        		let x = z('lg-username'),
                        			y = z('warn_username'),
                        			e = z('sub_info'),
                        			u = x.parentElement.classList;
                        		e.style.display = 'none';
                        		y.style.display = 'none';
                        		if(check){
                        			if(sub.length !== 0 && sub.length < 4){
                        				y.innerHTML = 'Subdomain is too short! Atleast 4 characters is required';
										warn(y, u);
										return false;
                        			}
                        		}
                        		if(sub.length === 0){
                        			e.innerHTML = '';
                        			if(check){
                        				y.innerHTML = 'Please choose a subdomain';
                        				warn(y, u);
                        			}
                        			return false;
                        		}
                        		if(sub.length < 4){
									return false;
                        		}
                        		if(sub.length > 16){
                        			y.innerHTML = 'Subdomain is too long! 16 characters max';
									warn(y, u);
									return false;
                        		}
                        		if(/^[A-Za-z0-9-]+$(?<!-)/.test(sub)){
	                        		e.innerHTML = `The domain will be ${sub}.${LOGGED_DOM}`;
	                        		e.style.display = 'block';
	                        		ok(y, u);
	                        		return true;
								}else{
									y.innerHTML = 'Only alphanumeric and "-" characters are allowed.<br/>Note: "-" at the end is not allowed';
									warn(y, u);
									return false;
								}
                        	}
                        	function submitHandler(){
                        		var r = true;

                        		// Domain checker
                        		(function(){
                        			if(!domainInfo(z('lg-username').value, true)){
                        				r = false;
                        			}
                        		})();
                        		// Email checker
                        		(function(){
                        			let x = z('lg-email'),
                        				y = z('warn_email'),
                        				u = x.parentElement.classList;
                        			if(z('lg-email').value.length === 0){
                        				y.innerHTML = 'Email cannot be empty';
										warn(y, u);
										r = false;
										return;
                        			}
                        			if(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(z('lg-email').value).toLowerCase()) === false){
                        				y.innerHTML = 'Please enter a valid email address';
										warn(y, u);
                        				r = false;
                        				return;
                        			}
                        			ok(y, u);
                        		})();
                        		// Password checker
                        		(function(){
                        			let x = z('lg-password'),
                        				y = z('warn_password'),
                        				u = x.parentElement.classList;
                        			if(x.value.length > 20){
                        				y.innerHTML = 'Password is too long! 20 characters max';
										warn(y, u);
										r = false;
										return;
                        			}
                        			if(x.value.length < 6){
                        				y.innerHTML = 'Password is too short! 6 characters minimum';
										warn(y, u);
										r = false;
										return;
                        			}
                        			ok(y, u);
                        		})();
                        		// Confirm password checker
                        		(function(){
                        			let x = z('lg-password-confirm'),
                        				y = z('warn_password_confirm'),
                        				u = x.parentElement.classList,
                        				o = z('lg-password');
                        			if(o.value.length === 0){
                        				return;
                        			}
                        			if(x.value !== o.value){
                        				y.innerHTML = 'Password does not match!';
										warn(y, u);
										r = false;
										return;
                        			}
                        			ok(y, u);
                        		})();
                        		// Captcha checker
                        		(function(){
                        			let x = z('lg-captcha'),
                        				y = z('warn_captcha'),
                        				u = x.parentElement.classList;
                        			if(x.value.length !== 5){
                        				y.innerHTML = 'Captcha must be 5 characters';
										warn(y, u);
										r = false;
										return;
                        			}
                        			ok(y, u);
                        		})();
                        		
                        		// TEST
								return r;
                        	}
                        </script>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>