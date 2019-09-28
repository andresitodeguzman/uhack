const clear = ()=>{
  $(".activity").hide();
};

const showActivity = (activity)=>{
  clear();
  $(`#${activity}Activity`).fadeIn();
};

const isLoggedIn = ()=>{
  try {
    if(JSON.parse(localStorage.getItem("user"))) {
      return true;
    } else {
      return false;
    }
  } catch (e) {
    return false;
  }
};