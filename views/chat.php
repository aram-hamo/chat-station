<!DOCTYPE html>
<html lang=en>
<head>
<script src="/static/bootstrap/js/bootstrap.bundle.min.js"></script>
<?php
include "../templates/header.php";
?>
<style>
.newMessageBox{
  position:absolute;
  bottom:2%;
  width:80%;
}
</style>
</head>
<body>
  <title><?= self::viewData()['title'] ?></title>
<div class="d-flex align-items-start">
  <div class="nav flex-column nav-pills me-3 tabs" id=tabs aria-orientation="vertical">
<!-- 3 -->
    <div>
      <input id="searchInput" class="form-control" placeholder="New Contact">
      <button class="btn btn-primary" onclick="usernameExists();">Search</button>
    </div>
  </div>
  <div class="tab-content">
    <div>
    <div class="tab-pane fade show active pills" id="v-pills-0" role="tabpanel" aria-labelledby="v-pills-0-tab" tabindex="0">
<!-- 3 -->

    </div>
  </div>
</div>


<div style="display:none;" id=contactsList><?php print_r(json_encode(self::viewData()['contactsList'])); ?></div>
<script>
// {{{ getCookie
function getCookie(cname) {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for(let i = 0; i <ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
// }}}
// {{{ usernameExists
function usernameExists(){
  username = document.getElementById("searchInput").value;
  message = document.getElementById("messageInput").value;

fetch(window.location.protocol+"//"+window.location.host+"/api", {
  method: "post",
  headers: {
  'Content-Type': 'application/x-www-form-urlencoded',
  'tokan':getCookie("tokan")
  },

  body:
    "action=usernameExists&username="+username
  }).then(data =>  data.json() ).then(d =>{
    return console.log(d["return"])
  })
}
// }}}
// {{{ sendMessage
function sendMessage(to){
  message = document.getElementById("messageInput").value;
  document.getElementById("messageInput").value = '';

fetch(window.location.protocol+"//"+window.location.host+"/api", {
  method: "post",
  headers: {
  'Content-Type': 'application/x-www-form-urlencoded',
  'tokan':getCookie("tokan")
  },

  body:
    "action=newMessage&toUser="+to+"&message="+message
})
}
// }}}
// {{{ getChatLog
window.chatlog = {};
function getChatLog(withUser,limit=10){
fetch(window.location.protocol+"//"+window.location.host+"/api", {
  method: "post",
  headers: {
  'Content-Type': 'application/x-www-form-urlencoded',
  'tokan':getCookie("tokan")
  },

  body:
  "action=getChatLog&limit="+limit+"&withUser="+withUser
}).then(data => {
    return data.json();
  }).then(data =>{
    window.chatlog[withUser] = JSON.stringify(data);
    chatBox = document.getElementById("chatBox-"+withUser);
    JSON.parse(window.chatlog[withUser]).forEach(message => {
      chatBox.innerHTML += "<p>"+message["message"]+"</p>";
      chatBox.innerHTML += "<p>from: "+message["from_user"]+"</p>";
    })

  })

}
//}}}
contactsList = document.getElementById("contactsList").innerText;
pills = document.getElementById("v-pills-0");
tabs = document.getElementById("tabs");

JSON.parse(contactsList).forEach(contact => {
pills.innerHTML +=`
    <div class="newMessageBox" >
    <div id="chatBox-`+contact+`" ></div>
      <input class="form-control" id="messageInput" placeholder="Message">
      <button class="btn btn-primary" onclick="sendMessage('`+contact+`');">Send</button>
    </div>`;
tabs.innerHTML +=`
  <button class="nav-link active" id="v-pills-0-tab" data-bs-toggle="pill" data-bs-target="#v-pills-0" type="button" role="tab" aria-controls="v-pills-0" >`+contact+`</button>`;
getChatLog(contact);
});

</script>
</body>
</html>
