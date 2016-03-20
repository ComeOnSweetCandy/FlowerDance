function returnImgUrl(imageUrl)
{
    var userImage = document.getElementById("dsp_UserImage");
    var newUrl = userImage.getAttribute("name");
    newUrl = newUrl+"/"+imageUrl;
    userImage.setAttribute("src",newUrl);
}