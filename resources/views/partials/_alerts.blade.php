
<script>

// import toastr from 'toastr';
toastr.options = {
  closeButton : true,
  timeOut : 15000,
  positionClass: "toast-bottom-left"
}

toastr["success"]("You have been registered successfully. We have sent you an email to verify your account."+
 "Please check your SPAM folder");
 // toastr.error("You have been registered successfully. We have sent you an email to verify your account."+
 //  "Please check your SPAM folder");
 //  toastr.info("You have been registered successfully. We have sent you an email to verify your account."+
 //   "Please check your SPAM folder");
 //   toastr.warning("You have been registered successfully. We have sent you an email to verify your account."+
 //    "Please check your SPAM folder");
</script>
