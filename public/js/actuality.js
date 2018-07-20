$(function () {

    let searchBar = $('input#search');
    let contentDiv = $('#article');

   function construct(datas) {
       let nickname;

       if (datas.author.nickname === null) {
           nickname = "NC";
       } else {
           nickname = datas.author.nickname;
       }

       let favorite = datas.favouredBy;
       let favored;

       if (favorite.length > 0)
       {
           favorite.forEach(function (fav) {
               favored ++;
           });
       } else { favored = ""}

       let dateArticle = new Date(datas.createdAt.date);

       let YY = dateArticle.getFullYear();
       let DD = dateArticle.getDate();
       let MM = dateArticle.getMonth();

       contentDiv.append(
           "<div class='col l6 m6 s12'>" +
                "<div class='card' id='article-card'>" +
                    "<div class='card-image'>" +
                        "<img src='"+ datas.img +"'/>"+
                        "<h2 class='card-title' id='article-card-title'>"+ datas.title +"</h2>"+
                    "</div>" +
                    "<div class='card-content'>" +
                        "<p>auteur : "+ nickname +"</p>"+
                        "<p class='chip'>"+ datas.category +" </p>"+
                        "<p>crée le : <em>"+DD+"-"+MM+"-"+YY+"</em></p>"+
                        "<p class='truncate'>" +
                            datas.content +
                        "</p>"+
                        "<a id='head-article-link' href='"+document.location.domain+"/article-"+ datas.id +"'>en lire" +
                        " plus</a>"+
                    "</div>"+
                    "<div class='card-action'>" +
                        "<a href='"+ document.location.domain +"/article-'"+ datas.id +" " +
                            "class='btn-floating halfway-fab waves-effect waves-light\n" +
                            "orange darken-1 btn-card'><i" +
                            " class='material-icons'>add</i></a>"+
                            "<div class='head-link'>"+
                                "<a href=''>" + favored +
                                    "<i class='material-icons head-heart'>favorite_border</i>"+
                                "</a>"+
                               "<a href=''>" +
                               "<i class='material-icons head-share'>share</i>"+
                               "</a>"+
                            "</div>"+
                    "</div>"
               + "</div>"
           + "</div>"
       );

   }

    $(searchBar).on('keyup', function (e) {

        if (e.target.value.length === 0) {
            $.getJSON(document.location.href + '/search-post',
                function (data) {
                    contentDiv.html("");
                    if (data.length === 0) {
                        contentDiv.html("<p>pas de resultat pour votre recherche</p>");
                    } else {
                        data.forEach(function (datas) {
                            construct(datas);
                        })
                    }
                }
            );
        }

        $.getJSON(document.location.href + '/search-post-' + e.target.value,
            function (data) {
                contentDiv.html("");
                if (data.length === 0) {
                    contentDiv.html("<p>pas de resultat pour votre recherche</p>");
                } else {
                    data.forEach(function (datas) {
                        construct(datas);
                    })

                }
            }
        );

    });


});