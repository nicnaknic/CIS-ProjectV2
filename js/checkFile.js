/*
    this file contains functions for file validation.   
    - File Extension (done)
    - File Size (done)
    - Error loading (pending)
    - Error uploading (pending)
*/
document.getElementById('file1').addEventListener('change', checkFile1, false);
document.getElementById('file2').addEventListener('change', checkFile2, false);

function checkFile1(e) 
{
    var file_list = e.target.files;

    for (var i = 0, file; file = file_list[i]; i++) 
    {
        var sFileName = file.name;
        var sFileExtension = sFileName.split('.')[sFileName.split('.').length - 1].toLowerCase();
        var iFileSize = file.size;
        var iConvert = (file.size / 10485760).toFixed(2);

        if (!(sFileExtension === "pdf" ||
              sFileExtension === "doc" ||
            sFileExtension === "docx") ||  iFileSize > 10485760)
        {
            txt = "File type : " + sFileExtension + "\n\n";
            txt += "Size: " + iConvert + " MB \n\n";
            txt += "Please make sure your file is in pdf or doc format and no bigger than 2 MB.\n\n";
            alert(txt);
            document.getElementById('file1').value = "";  
        }
    }
}

function checkFile2(e) 
{
    var file_list = e.target.files;

    for (var i = 0, file; file = file_list[i]; i++) 
    {
        var sFileName = file.name;
        var sFileExtension = sFileName.split('.')[sFileName.split('.').length - 1].toLowerCase();
        var iFileSize = file.size;
        var iConvert = (file.size / 10485760).toFixed(2);

        if (!(sFileExtension === "pdf" ||
              sFileExtension === "doc" ||
            sFileExtension === "docx") ||  iFileSize > 10485760)
        {
            txt = "File type : " + sFileExtension + "\n\n";
            txt += "Size: " + iConvert + " MB \n\n";
            txt += "Please make sure your file is in pdf or doc format and no bigger than 2 MB.\n\n";
            alert(txt);
            document.getElementById('file2').value = "";   
        }
    }
}




