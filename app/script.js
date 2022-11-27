const formModifyArticle = document.querySelectorAll(".modifyPostForm");
formModifyArticle.forEach((form) => {
    form.style.display = "none";
});

const openModifyArticle = document.querySelectorAll(".modifyButton");
openModifyArticle.forEach((button) => {
    let isVisible = false;
    button.onclick = (e) => {
        const formToDisplay = e.target.nextElementSibling;
        isVisible = !isVisible;
        formToDisplay.style.display = isVisible ? "block" : "none";
        e.target.innerHTML = isVisible ? "Annuler" : "Modifier";
    };
});