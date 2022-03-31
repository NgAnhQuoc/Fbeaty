function previewImg(e){
    const file = e.target.files[0];
    const localStorage = window.localStorage.getItem('img');
    if(localStorage){
        URL.revokeObjectURL(localStorage);
        window.localStorage.removeItem('img');
        e.target.parentElement.querySelector('img')?.remove();

        file.preview = URL.createObjectURL(e.target.files[0]);
        window.localStorage.setItem('img', file.preview);

        const img = document.createElement("img");   
        img.setAttribute("src",file.preview);
        img.classList.add('imgpreview');
        e.target.parentElement.append(img);

    }else{
        file.preview = URL.createObjectURL(e.target.files[0]);
        window.localStorage.setItem('img', file.preview);
        const img = document.createElement("img");  
        img.setAttribute("src",file.preview); 
        img.classList.add('imgpreview');
        e.target.parentElement.append(img);
    }
}
