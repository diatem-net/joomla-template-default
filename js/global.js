$(function() {
    cookiesplease.init({
        buttonAcceptText: 'Fermer',
        message: 'Notre site utilise des cookies. Certains cookies sont nécessaires au fonctionnement du site, tandis que d\'autres nous aident à améliorer l\'expérience utilisateur. En utilisant le site, vous acceptez l\'utilisation des cookies. Pour en apprendre plus au sujet des cookies et pour savoir comment les désactiver, <a href="/cookies">consultez notre déclaration de confidentialité</a>.'
    });
});

function shareFacebook(url) {
    window.open('http://www.facebook.com/share.php?u=' + url, 'Partager sur Facebook', config = 'height=400, width=600, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, directories=no, status=no');
}

function shareTwitter(url, title) {
    window.open('http://twitter.com/share?url=' + url + '&text=' + encodeURIComponent(title), 'Partager sur Facebook', config = 'height=400, width=550, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, directories=no, status=no');
}