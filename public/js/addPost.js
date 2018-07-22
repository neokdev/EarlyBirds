tinymce.init({
                 selector:'.tinymce',
                 menu: {
                     file: {title: 'File', items: 'newdocument'},
                     edit: {title: 'Edit', items: 'undo redo | cut copy paste pastetext | selectall'},
                     view: {title: 'View', items: 'visualaid'},
                 },
                 branding: false,
                 toolbar: ['undo redo | styleselect | bold italic | alignleft aligncenter' +
                           ' alignright alignjustify | bullist numlist '],
                 style_formats: [
                     {title: 'Headers', items: [
                             {title: 'Header 1', format: 'h1'}
                         ]},
                     {title: 'Inline', items: [
                             {title: 'Bold', icon: 'bold', format: 'bold'},
                             {title: 'Italic', icon: 'italic', format: 'italic'},
                             {title: 'Underline', icon: 'underline', format: 'underline'},

                         ]},
                     {title: 'Blocks', items: [
                             {title: 'Paragraph', format: 'p'},
                             {title: 'Blockquote', format: 'blockquote'},
                             {title: 'address', format: 'address'}
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
                     /<\script><\/script>/g  // Protect php code
                 ]



             });