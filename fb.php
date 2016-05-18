<a href="#" onclick="fblogin()" id="fbloginbtn"><img src="facebook-login-blue.png" /></a>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '{APPID}',
      xfbml      : true,
      version    : 'v2.5'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>


<script type="text/javascript">
		function fblogin()
		{
      FB.login(function (e) {
          e.authResponse ? getUserInfoFb() : console.log("Authorization failed.")
      }, {
          scope: "email, public_profile"
      })
    }

    function getUserInfoFb()
    {
      FB.api("/me?fields=id,name,email,first_name,last_name,gender,picture", function ( response ) {

        console.log( response )

            $("#fbloginbtn").hide();

            var temp = "<table>";
            temp += "            <tr>";
            temp += "                <th> Facebook ID</th>";
            temp += "                <th> User Name</th>";
            temp += "                <th> First Name</th>";
            temp += "                <th> Last Name</th>";
            temp += "                <th> Email Address</th>";
            temp += "                <th> Gender</th>";
            temp += "                <th> Location</th>";
            temp += "                <th> Picture</th>";
            temp += "            </tr>";
            temp += "            <tr>";
            temp += "                <td>"+response.id+"</td>";
            temp += "                <td>"+response.name+"</td>";
            temp += "                <td>"+response.first_name+"</td>";
            temp += "                <td>"+response.last_name+"</td>";
            temp += "                <td>"+response.email+"</td>";
            temp += "               <td>"+response.gender+"</td>";
            temp += "                <td>"+response.location+"</td>";
            temp += "                <td>"+response.picture.data.url+"</td>";
            temp += "            </tr> ";

          $("#content").html( temp );
      });
    }
</script>

<div id="content"></div>
