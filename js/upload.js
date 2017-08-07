function generateUpload(){
  var num = document.getElementsByName("num_of_uploads")[0].value;
  var uploadDiv = document.getElementById("uploadFiles");
  var cnt = 1;
  var str = "";
  while(num-- > 0){
    str += "<input type='hidden' name='MAX_FILE_SIZE' value='2000000'> <input name='file"+cnt+"' type='file' id='crsfile"+cnt+"'>";
    cnt++;
  }
  uploadDiv.innerHTML = str;
}
