<template>
  <div class="md-layout">
    <div class="md-layout-item-xsmall bar">
      <p></p>
    </div>

    <div class="md-layout-item-small form-area">
      <form action="login">
        <p class="md-title">Log in</p>
        <p class="md-subheading">Find great recipes now!</p>

        <label for="username">Username:</label>
        <br />
        <input type="text" id="username" name="username" class="cred"/>
        <br /><br>

        <label for="pwd">Password:</label>
        <br />
        <input type="password" id="pwd" name="pwd" class="cred"/>
        <br><br>
        <input type="submit" value="Login" class="loginbtn">
      </form>
    </div>
    <div class="md-layout-item">
      <img id="rb-logo" src="../../assets/Logo Image@2x.png">
    </div>
  </div>
</template>

<script>
export default {
  name: "LoginForm",
  data() {
    return {};
  }
};
</script>

<style>

.loginbtn{
  background-color: #4C52FF;
  width: 65pt;
  border-radius: 35pt;
}

label{
  color: #808080;
}

input{
  background-color: #212630;
  border: none;
  color: white;
  padding: 8pt;
}

.cred{

  width: 200pt;
}

.bar {
  width: 15pt;
  background-color: #4c52ff;
  /* height: ; */
}

.form-area {
  padding: 20pt;
  padding-top: 60pt;
  width: 600pt;
  text-align: center;
}
</style>