function changeView() {
    var signUpBox = document.getElementById("signUpBox");
    var signInBox = document.getElementById("signInBox");

    signInBox.classList.toggle("d-none");
    signUpBox.classList.toggle("d-none");

}

function signUp() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var psw = document.getElementById("psw");
    var mobile = document.getElementById("mobile");
    var gender = document.getElementById("gender");

    var form = new FormData();
    form.append("fn", fname.value);
    form.append("ln", lname.value);
    form.append("em", email.value);
    form.append("pw", psw.value);
    form.append("mb", mobile.value);
    form.append("gd", gender.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "Success") {
                fname.value = ("");
                lname.value = ("");
                email.value = ("");
                psw.value = ("");
                mobile.value = ("");
                changeView();
            } else {
                alert(text);
            }
        }
    }

    r.open("POST", "signUpProcess.php", true);
    r.send(form);
}

function viewPassword1() {

    var viewPassword1 = document.getElementById("viewPassword1");
    var psw = document.getElementById("psw");

    if (psw.type == "text") {

        psw.type = "password";
        viewPassword1.innerHTML = "<i class='bi bi-eye-slash-fill'></i>";

    } else {
        psw.type = "text";
        viewPassword1.innerHTML = "<i class='bi bi-eye-fill'></i>";
    }


}

function viewPassword2() {

    var viewPassword2 = document.getElementById("viewPassword2");
    var psw2 = document.getElementById("psw2");

    if (psw2.type == "text") {

        psw2.type = "password";
        viewPassword2.innerHTML = "<i class='bi bi-eye-slash-fill'></i>";

    } else {
        psw2.type = "text";
        viewPassword2.innerHTML = "<i class='bi bi-eye-fill'></i>";
    }


}

function viewPassword3() {

    var viewPassword3 = document.getElementById("viewPassword3");
    var psw3 = document.getElementById("psw3");

    if (psw3.type == "text") {

        psw3.type = "password";
        viewPassword3.innerHTML = "<i class='bi bi-eye-slash-fill'></i>";

    } else {
        psw3.type = "text";
        viewPassword3.innerHTML = "<i class='bi bi-eye-fill'></i>";
    }


}

var signUpBTN = document.getElementById("signUpBTN");

function spinner1() {

    signUpBTN.innerHTML = "<div class='dot-carousel'></div>";

    setTimeout(signUp, 4000);

    setTimeout(spinner1change, 3900);

}

function spinner1change() {
    signUpBTN.innerHTML = "Register";
}

function signIn() {

    var email2 = document.getElementById("email2");
    var psw2 = document.getElementById("psw2");
    var rememberme = document.getElementById("rememberMe");

    var f = new FormData();
    f.append("em", email2.value);
    f.append("psw", psw2.value);
    f.append("reme", rememberme.checked);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "Success") {
                window.location = "home.php";
            } else {

                alert(t);
            }
        }
    }

    r.open("POST", "signInProcess.php", true);
    r.send(f);

}

var signInBTN = document.getElementById("signInBTN");

function spinner2() {

    signInBTN.innerHTML = "<div class='dot-carousel'></div>";

    setTimeout(signIn, 4000);

    setTimeout(spinner2change, 3900);
}

function spinner2change() {
    signInBTN.innerHTML = "Sign In";
}

function himg() {

    window.location = "home.php";
}

function singleProductView(id) {
    window.location = "singleProduct.php?id=" + id;
}

function down(id) {
    var qty = document.getElementById("qtyCartItem" + id);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        var t = r.responseText;

        if (r.readyState == 4) {

            if (t == "Success") {
                window.location = "cart.php";
            } else {
                alert(t);
            }
        }

    }

    r.open("GET", "cartQtyDownProcess.php?qty=" + qty.value + "&id=" + id, true);
    r.send();

    if (qty.value > "1") {

        qty.value = parseInt(qty.value) - 1;
        qty.innerHTML = qty;

    }

}

function up(id) {
    var qty = document.getElementById("qtyCartItem" + id);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        var t = r.responseText;

        if (r.readyState == 4) {

            if (t == "Success") {
                window.location = "cart.php";
            } else {
                alert(t);
            }
        }

    }


    r.open("GET", "cartQtyUpProcess.php?qty=" + qty.value + "&id=" + id, true);
    r.send();

    qty.value = parseInt(qty.value) + 1;
    qty.innerHTML = qty;
}

function spinner3() {

    signInBTN.innerHTML = "<div class='dot-carousel'></div>";
    setTimeout(adminLogin, 4000);
    setTimeout(spinner3change, 3900);
}

function spinner3change() {
    signInBTN.innerHTML = "Log In";


}

function adminLogin() {

    adminVerification();
}

function printInvoice() {

    var page = document.getElementById("page").innerHTML;
    var restorePage = document.body.innerHTML;
    document.body.innerHTML = page;

    window.print();

    document.body.innerHTML = restorePage;
}

var pm;

function viewProductModal() {

    var am = document.getElementById("viewproductmodal");
    pm = new bootstrap.Modal(am);
    pm.show();
}

var cvm;
var newCategoty;
var uemail;

function categoryVerifyModal() {

    var m = document.getElementById("addCategoryModalVerification");
    cvm = new bootstrap.Modal(m);
    cvm.show();

}

function addNewCategoty() {

    var m = document.getElementById("addCategoryModal");
    cm = new bootstrap.Modal(m);
    cm.show();
}

function pupdate() {
    window.location = "updateProduct.php"
}

function removeWl(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {

            var t = r.responseText;

            if (t == "Success") {
                window.location = "watchlist.php";
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "watchlistDProcess.php?id=" + id, true);
    r.send();
}

function wlAddtocart(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {

            var t = r.responseText;
            alert(t);

        }
    }

    r.open("GET", "wladdcartProcess.php?id=" + id, true);
    r.send();

}

function cartSAll(id) {

    var mCheckBox = document.getElementById("mCheckBox");

    if (mCheckBox.checked) {

        for (i = 0; i < id; i++) {
            var checkBox = document.getElementById("checkBox" + i);
            checkBox.checked = true;
        }

    } else {

        for (i = 0; i < id; i++) {
            var checkBox = document.getElementById("checkBox" + i);
            checkBox.checked = false;
        }
    }
}

function cartAllDelete() {

    if (mCheckBox.checked) {
        var r = new XMLHttpRequest();

        r.onreadystatechange = function() {
            var t = r.responseText;
            if (r.readyState == 4) {

                alert(t);

                window.location = "cart.php";
            }

        }
        r.open("GET", "cartAllDeleteProcess.php", true);
        r.send();

    } else {
        alert("Plaese tick Select All.");
    }
}

function cartDelete(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        var t = r.responseText;
        if (r.readyState == 4) {

            alert(t);

            window.location = "cart.php";
        }

    }
    r.open("GET", "cartDeleteProcess.php?id=" + id, true);
    r.send();
}

function hCategory(id) {


    var f = new FormData();
    f.append("cid", id);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("viewarea").innerHTML = t;
            // alert(t);
        }
    }

    r.open("POST", "hcategoryProcess.php", true);
    r.send(f);

}

function all_category() {
    window.location = "home.php";
}

(function($) {

    if ($('#bxslider-home4').length > 0) {
        var slider = $('#bxslider-home4').bxSlider({
            nextText: '<i class="fa fa-angle-right"></i>',
            prevText: '<i class="fa fa-angle-left"></i>',
            auto: true,
            onSliderLoad: function(currentIndex) {
                $('#bxslider-home4 li').find('.caption').each(function(i) {
                    $(this).show().addClass('animated fadeInRight').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
                        $(this).removeClass('fadeInRight animated');
                    });
                })
            },
            onSlideBefore: function(slideElement, oldIndex, newIndex) {
                slideElement.find('.caption').each(function() {
                    $(this).hide().removeClass('animated fadeInRight');
                });
            },
            onSlideAfter: function(slideElement, oldIndex, newIndex) {
                setTimeout(function() {
                    slideElement.find('.caption').each(function() {
                        $(this).show().addClass('animated fadeInRight').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
                            $(this).removeClass('fadeInRight animated');
                        });
                    });
                }, 500);
            }
        });
    }
})(jQuery);


var xm;

function adminVerification() {


    var em = document.getElementById("email2");

    var form = new FormData();
    form.append("em", em.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {

            var t = r.responseText;

            if (t == "Success") {
                var verificationModal = document.getElementById("verificationModal");
                xm = new bootstrap.Modal(verificationModal);
                xm.show();
            } else {

                alert(t);
            }
        }
    }
    r.open("POST", "adminVerficationProcess.php", true);
    r.send(form);
}

function verify() {

    var vcode = document.getElementById("vcode");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {

            var t = r.responseText;

            if (t == "Success") {

                vcode.value = " ";
                xm.hide();
                window.location = "adminPanel.php";
            } else {

                alert(t);
            }
        }
    }

    r.open("GET", "verifyProcess.php?id=" + vcode.value, true);
    r.send();

}

var bm;

function forgotPassword() {

    var email = document.getElementById("email2");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                alert("Verification Code has sent to your email. Please check inbox.");
                var m = document.getElementById("fogotPasswordModal");
                bm = new bootstrap.Modal(m);
                bm.show();
            }
        }
    }

    r.open("GET", "forgotPasswordProcess.php?e=" + email.value, true);
    r.send();
}

function resetpassword() {
    var e = document.getElementById("email2");
    var np = document.getElementById("np");
    var rnp = document.getElementById("rnp");
    var vc = document.getElementById("vc");


    var form = new FormData();
    form.append("e", e.value);
    form.append("np", np.value);
    form.append("rnp", rnp.value);
    form.append("vc", vc.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {

            var t = r.responseText;

            if (t == "success") {

                alert("Password reset success");
                bm.hide();

            } else {
                alert(t);
            }

        }
    }

    r.open("POST", "resetPassword.php", true);
    r.send(form);
}

function addwatchl(id) {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {

            var t = r.responseText;
            alert(t);

        }
    }

    r.open("GET", "addwatchlistProcess.php?id=" + id, true);
    r.send();
}

function signOut() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {

            var t = r.responseText;

            if (t == "success") {
                window.location = "index.php";
            }
        }

    }

    r.open("GET", "signOutProcess.php", true);
    r.send();

}

function myProductAddproduct() {
    window.location = "addProduct.php";
}

function addproduct() {

    var pc = document.getElementById("pc");
    var pb = document.getElementById("pb");
    var pm = document.getElementById("pm");
    var title = document.getElementById("title");
    var pcon = document.getElementById("pcon");
    var qty = document.getElementById("qty");
    var pcolor = document.getElementById("pcolor");
    var pdesc = document.getElementById("pdesc");
    var cost = document.getElementById("cost");
    var doc = document.getElementById("doc");
    var dwc = document.getElementById("dwc");
    var preview0 = document.getElementById("preview0");
    var preview1 = document.getElementById("preview1");
    var preview2 = document.getElementById("preview2");
    var imageuploder = document.getElementById("imageuploder");

    var f = new FormData();
    f.append("c", pc.value);
    f.append("b", pb.value);
    f.append("m", pm.value);
    f.append("t", title.value);
    f.append("co", pcon.value);
    f.append("qty", qty.value);
    f.append("col", pcolor.value);
    f.append("desc", pdesc.value);
    f.append("p", cost.value);
    f.append("doc", doc.value);
    f.append("dwc", dwc.value);
    f.append("img", imageuploder.files[0]);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Product added successfully") {
                pc.value = ("0");
                pb.value = ("0");
                pm.value = ("0");
                title.value = ("");
                pcon.value = ("0");
                qty.value = ("");
                pcolor.value = ("");
                pdesc.value = ("");
                cost.value = ("");
                doc.value = ("");
                dwc.value = ("");
                imageuploder.files[0] = ("");
                pcon.value = ("");
                alert(t);
                window.location = "myproducts.php"
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "addProductProcess.php", true);
    r.send(f);

}

function deletemyPrd(id) {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {

            var t = r.responseText;

            alert(t);
        }
    }

    r.open("GET", "deleteMyPrdProcess.php?id=" + id, true);
    r.send();
}

function changeStatus(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {

            var t = r.responseText;

            window.location = "myproducts.php";
        }
    }

    r.open("GET", "changeStatusProcess.php?id=" + id, true);
    r.send();

}


function update_profile() {

    var fname = document.getElementById("fn");
    var lname = document.getElementById("ln");
    var mobile = document.getElementById("mo");
    var line1 = document.getElementById("ln_1");
    var line2 = document.getElementById("ln_2");
    var province = document.getElementById("pr");
    var district = document.getElementById("dr");
    var city = document.getElementById("ci");
    var postal_code = document.getElementById("pc");
    var image = document.getElementById("profileimg");

    var form = new FormData();
    form.append("fn", fname.value);
    form.append("ln", lname.value);
    form.append("m", mobile.value);
    form.append("li1", line1.value);
    form.append("li2", line2.value);
    form.append("pr", province.value);
    form.append("dr", district.value);
    form.append("ci", city.value);
    form.append("pc", postal_code.value);

    if (image.files.length == 0) {

        var confirmation = confirm("Are you sure you don't want to update your profile picture?");

        if (confirmation) {

            alert("You have not selected any Image.");

        }

    } else {

        form.append("img", image.files[0]);
    }


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {

            var t = r.responseText;

            if (t == "please log into your account first") {

                alert("please log into your account first");
                window.location = "index.php";
            } else if (t == "success") {
                window.location = "userProfile.php";
            } else {
                alert(t);
                window.location = "userProfile.php";

            }

        }
    }

    r.open("POST", "updateProfileProcess.php", true);
    r.send(form);

}

function updateProduct(id) {

    var title = document.getElementById("ti");
    var qty = document.getElementById("qty");
    var delivery_within_colombo = document.getElementById("dwc");
    var delivery_outof_colombo = document.getElementById("doc");
    var description = document.getElementById("desc");
    var image = document.getElementById("imageuploder");


    var f = new FormData();
    f.append("id", id);
    f.append("t", title.value);
    f.append("q", qty.value);
    f.append("dwc", delivery_within_colombo.value);
    f.append("doc", delivery_outof_colombo.value);
    f.append("d", description.value);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            alert(text);
            window.location = "myproducts.php";
        }
    }

    r.open("POST", "updateProductProcess.php", true);
    r.send(f);
}

function basicSearch(x) {

    var text = document.getElementById("basic_search_text");
    // var select = document.getElementById("basic_search_select");

    var f = new FormData();
    f.append("t", text.value);
    // f.append("s", select.value);
    f.append("page", x);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {

            var t = r.responseText;
            document.getElementById("viewarea").innerHTML = t;
        }
    }




    r.open("POST", "basicSearchProcess.php", true);
    r.send(f);

}