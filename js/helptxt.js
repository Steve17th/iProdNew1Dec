const textarea = document.getElementById("txt");
const textCls = document.getElementById("hlp");

// Event listener
textCls.addEventListener('click', ()=>{
    if (textarea.value==''){
        alert('Text field is blank!');
    }else{
        textarea.value='';
        alert('Alright, got it! Now sit back and wait a moment while our team attends to you!');
    }
});