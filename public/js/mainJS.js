/************************ below this is index ***************************************************/
var imageCount = 1;
var total = 6;

function photo(x) {
	var image = document.getElementById('image');
	imageCount = imageCount + x;
	if(imageCount > total){imageCount = 1;}
	if(imageCount < 1){imageCount = total;}
	image.src = "images/img"+ imageCount +".jpg";
	}

window.setInterval(function photoA() {
	var image = document.getElementById('image');
	imageCount = imageCount + 1;
	if(imageCount > total){imageCount = 1;}
	if(imageCount < 1){imageCount = total;}
	image.src = "images/img"+ imageCount +".jpg";
	},2000);


/************************ below this is shop **************************************************
var total_price = 0;
function AddtoCart(price, i, product)
    {

        var i = i;
        var prod = product;
        var price = price;
        var quan = document.getElementsByClassName("quantity")[i].value;
        var pri = price * quan;
    if (quan==0)
    {
        alert("Must choose a quantity");
    }
    else
        {
        var row=document.getElementById("shop_b").insertRow();

        var cellProduct = row.insertCell(0);
        var cellQuan=row.insertCell(1);
        var cellPrice = row.insertCell(2);
            cellPrice.align="right";
            alert(prod+ " added to the cart");
            cellProduct.innerHTML = prod;
            cellQuan.innerHTML = quan;
            cellPrice.innerHTML = "&euro;"+pri;
        	total_price+=pri;


        document.getElementById("total").innerHTML="&euro;"+total_price;
        }
    }
 */