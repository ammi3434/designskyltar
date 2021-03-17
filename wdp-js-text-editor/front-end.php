<?php
function wdp_frontend_view()
{
?>
  <style>
    .wdp-editor {
      display: grid;
      grid-template-columns: 30% auto;
      gap: 20px;
    }

    #c {
      border: 1px solid black;
      top: 22px;
      left: 0px;
      background: blue
    }


    .box {
      float: left;
      margin: 1em;
    }

    .after-box {
      clear: left;
    }

    .swesajt-left-side {
      border: 1px;
      border-style: solid;
      background-color: grey;
      border-radius: 10px;
      padding: 10px;
    }
  </style>
  

  <script src='https://cdnjs.cloudflare.com/ajax/libs/fabric.js/1.6.5/fabric.min.js'></script>
  <div class="container">
    <div class="wdp-editor">
      <div class="swesajt-left-side">
        <a class="btn btn-primary" onclick="EnviarCorreo()">test</a>
        <a class="btn btn-primary mt-3" id="centerHight" onclick="centerHight()">Centrera Vertikalt</a>
        <a class="btn btn-primary mt-3" id="centerWidth" onclick="centerWidth()">Centrera Horisontellt</a> 
        <div class="row pt-2 pb-2">
          <div class="col">
            <label class="form-label" for="text-color" style="display:inline-block">Textfärg:</label>
          </div>
          <div class="col">
            <input class="form-control-color" type="color" value="" id="text-color" size="10">
          </div>
        </div>
        <div id="text-wrapper" style="margin-top: 10px" ng-show="getText()">
          <div id="text-controls">
            <label for="font-family" style="display:inline-block">Typsnitt:</label>
            <select id="font-family" class="form-control">
              <option value="arial">Arial</option>
              <option value="helvetica" selected>Helvetica</option>
              <option value="myriad pro">Myriad Pro</option>
              <option value="delicious">Delicious</option>
              <option value="verdana">Verdana</option>
              <option value="georgia">Georgia</option>
              <option value="courier">Courier</option>
              <option value="comic sans ms">Comic Sans MS</option>
              <option value="impact">Impact</option>
              <option value="monaco">Monaco</option>
              <option value="optima">Optima</option>
              <option value="hoefler text">Hoefler Text</option>
              <option value="plaster">Plaster</option>
              <option value="engagement">Engagement</option>
            </select>
            <div class="row">
              <div class="col">
                <label for="text-bg-color">Bakgrund:</label>
              </div>
              <div class="col">
                <input type="color" value="" id="text-bg-color" size="10">
              </div>
            </div>
            <div>
              <label for="c-width">Höjd (mm):</label>
              <input type="number" value="500" id="c-width">
            </div>
            <div class="row">
              <div class="col">
                <label for="c-height">Bredd (mm):</label>
                <input c type="number" value="300" id="c-height">
              </div>
            </div>
            <div class="row">
              <div class="col">
                <label for="c-height">Pris</label>
              </div>
              <div class="col">
                <p id="image-price">600 kr</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="wdp-right-side box">

        <canvas id="c"></canvas>
      </div>

    </div>
  </div>

<?php
}
