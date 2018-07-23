tinymce.init({
                 selector:'.tinymce',
                 plugins: ["lists advlist link"],
                 menubar: 'edit view insert',
                 branding: false,
                 toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter' +
                          ' alignright alignjustify | bullist numlist | link',


                 style_formats: [
                     {title: 'Headers', items: [
                             {title: 'Header 1', format: 'h1', styles: {'class': 'article_h1'}},
                             {title: 'Header 2', format: 'h2', styles: {'class': 'article_h2'}},
                             {title: 'Header 3', format: 'h3', styles: {'class': 'article_h3'}},
                         ]},
                     {title: 'Inline', items: [
                             {title: 'Bold', icon: 'bold', format: 'bold'},
                             {title: 'Italic', icon: 'italic', format: 'italic'},
                             {title: 'Underline', icon: 'underline', format: 'underline'},

                         ]},
                     {title: 'Blocks', items: [
                             {title: 'Paragraph', format: 'p', remove: 'all', attributes: { style: "padding: 0 0 1em 0; font-size: 13px; line-height: 1.5em" }},
                             {title: 'Blockquote', format: 'blockquote'},
                             {title: 'address', format: 'address', styles: {'class': 'address'}}
                         ]},
                     {title: 'Alignment', items: [
                             {title: 'Left', icon: 'alignleft', format: 'alignleft'},
                             {title: 'Center', icon: 'aligncenter', format: 'aligncenter'},
                             {title: 'Right', icon: 'alignright', format: 'alignright'},
                             {title: 'Justify', icon: 'alignjustify', format: 'alignjustify'}
                         ]}
                 ],
                 protect: [
                     /\<\/?(if|endif)\>/g,  // Protect <if> & </endif>
                     /\<xsl\:[^>]+\>/g,  // Protect <xsl:...>
                     /<\?php.*?\?>/g,  // Protect php code
                 ],
                 advlist_bullet_styles: 'default circle square',
                 advlist_number_styles: 'default upper-roman upper-alpha lower-alpha',

             });

$(function () {
    //flash message after valide or update obs
    let msgUn = $('.flash-post');

    if (msgUn.text().length > 0) {

        msgUn.fadeOut(9000)
    }
});
