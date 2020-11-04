function card1(){
    const followers = document.querySelector(".followers");
    const follow = document.querySelector(".follow");
    followers.innerHTML==="1000" ? followers.innerHTML="1001" : followers.innerHTML="1000";
    follow.innerHTML==="Follow" ? follow.innerHTML="Unfollow" : follow.innerHTML="Follow";
}
function card2(){
    const followers = document.querySelector(".followers1");
    const follow = document.querySelector(".follow1");
    followers.innerHTML==="1000" ? followers.innerHTML="1001" : followers.innerHTML="1000";
    follow.innerHTML==="Follow" ? follow.innerHTML="Unfollow" : follow.innerHTML="Follow";
}