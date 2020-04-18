function usernameCheck(username) {
    if (username.match(/^@([\w\.]){1,11}$/)) {
        return true
    }
    return false
  }

function passwordCheck(password) {
if (password.match(/^([\d]){6}$/)) {
    return true
}
return false
}
  
console.log(usernameCheck("@123_12faris"))
console.log(passwordCheck("123456"))
