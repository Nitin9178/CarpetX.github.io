<style type="text/css">
*
{
    margin : 0;
    padding : 0;
    box-sizing : border-box;
}

.about h3{
    font-size : 40px;
    font-weight : bold;
    letter-spacing : .5pt;
    word-spacing : .5pt;
    text-align : center;
}
.about img{
    width : 100%;
    height : 70vh;
    padding :  0 10px;
}

.heading{
    width : 100%;
    height : auto;
    font-size : 40px;
    font-family :  fantasy;
    font-weight : bold;
    text-align : center;
    text-transform : uppercase;
    margin : 10px 0 ;
   
}
.para{
   width : 100%;
   height : auto;
   font-size : 30px;
   font-family : cursive;
   text-align : center;
}

.about-carpet{
    padding  10px 10px;
    width : 100%;
    height : auto;
}

 .left-side img , .about-para , .card-head , .card-image{
    opacity : 0;
}
 .left-side img.animated , .about-para.animated , .card-head.animated , .card-image.animated{
    opacity : 1;
    animation-delay : .5s;
}
.right-side p{
    font-size : 30px;
    font-family : serif;
}
 .product-detail{
     width : 100%;
     height : auto;
     padding : 50px;
     position : relative;
 }
 .product-detail:before{
    content : '';
    position : absolute;
    top : 0;
    right : 0;
    left : 0;
    bottom : 0;
    z-index : -1;
    background : linear-gradient(160deg , #16c9f6 55% , #fff 0);
}
.col-div:hover{
    position : relative;
    top : -10px;
}
.product-detail h2{
    width : 100%;
    height : auto;
    font-size : 30px;
    color : #fff;
    font-family : arial;
    text-align : center;
    font-weight : bold;
    text-transform : uppercase;
}
.product-detail h4{
    font-size : 20px;
    font-weight : 100;
    text-align : center;
    background : lightgrey;
    color : white;
    font-weight : bold;
    text-transform : uppercase;
}
.product-detail img{
    width : 100%;
    height : 200px;
    margin : 10px 0;
}

.service{
    width : 100%;
    height : auto;
    padding : 50px;
    position : relative;
}
.service:before 
{
    content : '';
    position : absolute;
    top : 0;
    right : 0;
    left : 0;
    bottom : 0;
    z-index : -1;
    background : linear-gradient(140deg ,  rgba(0,0,0,0.3) , rgba(255,255,255,.1)) , url('images/23.jpg');
    background-repeat : no-repeat;
    background-size : 100% 100%;
}
.service .center-head{
    color : #fff;
    font-size : 20px;
    font-weight : bold;
    font-family : serif;
    justify-content : center;
    text-align : center;
}
.service-display 
{
    width : 100%;
    height : auto;
    padding : 20px;
    position : relative;
    justify-content : center;
    text-align : center;
    align-items : center;
}
.service-display h3{
    font-size : 25px;
    letter-spacing : 1px;
    font-weight : bold;
    font-family : 'poppins' , serif;
    border-radius : 100px;
}
.service-display p{
    color : #fff;
    font-size : 15px;
    letter-spacing : 1px;
    word-spacing : 1px;
    font-family : arial;
    float : left;
    justify-content : center;
    text-align : center;
    align-items : center;
}
.extra-div:hover{
    transition : .5s;
    box-shadow : 0 0 10px rgba(0,0,255,.3);
    top : -10px;
}

.company{
    width : 100%;
    height : auto;
    position : relative;
    justify-content : center;
    text-align : center;
    align-items : center;
}
.company h2 
{
    font-size : 25px;
    letter-spacing : 1px;
    font-weight : bold;
    font-family : cursive;
    text-transform : uppercase;
    padding : 10px 0;
}
.company h3{
    font-size : 20px;
    letter-spacing : 1px;
    word-spacing : 1px;
    font-family : arial; 
}
</style>