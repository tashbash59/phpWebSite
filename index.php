<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
    <title>Ссылки</title>
</head>
<body>
    <!-- <a href="canvas.html" style='font-size: 40px'>canvas</a>
    <br>
    <a href="svg.html" style='font-size: 40px'>svg</a> -->
    <canvas height = '100' width = '250' id = 'cnvs'>Обновите браузер</canvas>
    <script>
        //Первое 
        var cnvs = document.getElementById("cnvs");
        ctx = cnvs.getContext('2d');
        ctx.fillStyle = '#FFFFFF'
        ctx.fillRect(0, 0, cnvs.width, cnvs.height);
        ctx.beginPath();
        ctx.moveTo(15, 10);
        ctx.lineTo(15, 50);
        ctx.lineTo(15, 50);
        ctx.lineTo(10, 50);
        ctx.lineTo(10, 60);
        ctx.moveTo(15, 10);
        ctx.lineTo(25, 10);
        ctx.lineTo(25, 50);
        ctx.lineTo(30, 50);
        ctx.lineTo(30, 60);
        ctx.moveTo(25, 50);
        ctx.lineTo(15, 50);
        ctx.strokeStyle = '#EE82EE'
        ctx.stroke();
        ctx.closePath();
    
        ctx.beginPath()
        ctx.moveTo(40, 10);
        ctx.lineTo(40, 60);
        ctx.moveTo(40, 10);
        ctx.lineTo(55, 10);
        ctx.strokeStyle = 'MediumVioletRed'
        ctx.stroke();
        ctx.closePath();
    
        ctx.beginPath();
        ctx.arc(40, 47, 12, Math.PI/2, 3*Math.PI/2, true);
        ctx.stroke();
        ctx.closePath();
    
        ctx.beginPath();
        ctx.moveTo(62, 10);
        ctx.lineTo(92, 10);
        ctx.moveTo(77, 10);
        ctx.lineTo(77, 60);
        ctx.strokeStyle = 'rgb(75, 0, 130)'
        ctx.stroke();
        ctx.closePath();
    
        //Второе 
        function drawStroked(text, x, y) {
          ctx.font = '50px ComicSans';
          ctx.strokeStyle = 'Green';
          ctx.lineWidth = 4;
          ctx.strokeText(text, x, y)
          ctx.fillStyle = '#00FF00';
          ctx.fillText(text, x, y);
        }
        drawStroked('ДБТ', 100, 50)
      </script>
    <svg width = '500' height = '100'>
    <!-- <line x1 = "10" y1 = '10' x2 = '10' y2 = '60' style = 'stroke:rgb(75, 0, 130)'/>
    <ellipse cx = '25' cy = '35' rx = '15' ry = '5' style = 'fill:rgb(75, 0, 130)'/>
    <path d = "M40 10 L40 60 L42 60  L42 10 Z" style="fill:rgb(75, 0, 130)"/> -->
    <polyline points = "
      15,10 15,50 10,50 10,60 10,50 30,50 30,60 30,50 25,50 25,10 15,10
    " style="fill:white;stroke:rgb(75, 0, 130)"/>

    <rect x = '52' y = '10' width = '3' height = '50' style = 'fill:MediumVioletRed'/>
    <line x1 = "52" y1 = '10' x2 = '77' y2 = '10' style = 'stroke:rgb(194, 13, 104)'/>
    <circle cx = "67" cy = '45' r = '12' style = 'fill: white; stroke:MediumVioletRed'/>

    <polyline points = "89,10 100,10 100,60 100,10 110,10" style="fill:white;stroke:rgb(75, 0, 130)"/>
  
    <!--Четвертое-->
    <text x="140" y="60" style="stroke:green; font-family:ComicSans; font-size:50pt; fill:#00FF00";>
        ДБТ
    </text> 
  </svg>
</body>
</html>