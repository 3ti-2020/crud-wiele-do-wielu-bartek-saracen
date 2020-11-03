    const followers = document.querySelector('.followers');
    const follow = document.querySelector('.follow');
    follow.addEventListener('click',() => {
        followers.innerHTML==="1000" ? followers.innerHTML="1001" : followers.innerHTML="1000";
        follow.innerHTML==="Follow" ? follow.innerHTML="Unfollow" : follow.innerHTML="Follow";
    });