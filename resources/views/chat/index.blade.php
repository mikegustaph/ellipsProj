<html>

<head>
    <style>
        body {
            background: #fafafa;
            border: 12px solid blueviolet;
            padding: 20px;
        }
    </style>
    <!--Embed Code starts-->
    <script type="text/javascript">
        window.mychat = window.mychat || {};
        // domain for widget code embed
        window.mychat.server = 'https://localhost:3002';
        window.mychat.iframeWidth = '700px';
        window.mychat.iframeHeight = '700px';
        (function() {
            var mychat = document.createElement('script');
            mychat.type = 'text/javascript';
            mychat.async = true;
            mychat.src = window.mychat.server + '/embed/widget.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(mychat, s);
        })();
    </script>
    <!--Embed Code ends-->
</head>

<body>
    <h2>This is my website</h2>
    <div style="min-height:500px; background:#ccc; display:flex; padding:20px;">Something here</div>
</body>

</html>
