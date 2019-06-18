<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
</head>
<body>

<div id="container" style="width:800px;height:600px;border:1px solid grey"></div>
<input type="button" onclick="executeCode()" value="Execute"></input>
<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@0.13.0"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/babel-polyfill/6.23.0/polyfill.min.js"></script>
<script src="dist/browser.js"></script>
<script src="https://unpkg.com/monaco-editor@0.8.3/min/vs/loader.js"></script>
<script>
    var editor;
    require.config({ paths: { 'vs': 'http://unpkg.com/monaco-editor@0.8.3/min/vs' }});
    require(['vs/editor/editor.main'], function() {
        fetch('/node_modules/technicalindicators/declarations/generated.d.ts', { method: 'get'}).then(function(response) { return response.text()  }).then(function(content) {
                var technicalIndicators = content.replace(new RegExp('default ', 'g'), '').split('export').join('declare');
                var disposable = monaco.languages.typescript.typescriptDefaults.addExtraLib(
                technicalIndicators
                , 'indicators.d.ts');
                monaco.languages.typescript.typescriptDefaults.setCompilerOptions({
                    target: monaco.languages.typescript.ScriptTarget.ES5,
                    noEmit : true,
                    // noLib : true,
                    allowNonTsExtensions: true
                });
                editor = monaco.editor.create(container, {
                    value: `//Try indicators and check console
var result = sma({period : 3 , values: [1,2,3,4,5,6,7,8,9]});
console.log(result)
var closes = [
  0.0157284,
  0.01611,
  0.014443,
  0.0140176,
  0.0162684,
  0.01613634,
  0.01558049,
  0.01575501,
  0.0149112,
  0.01480108,
  0.01480001,
  0.01525985,
  0.01544233,
  0.0144598,
  0.01382822,
  0.01279583,
  0.01175,
  0.01159958,
  0.01178,
  0.011123,
  0.01112922,
  0.0114,
  0.01355,
  0.01349045,
  0.01959994,
  0.02218001,
  0.02176,
  0.0198301,
  0.02487826,
  0.0318,
  0.03004005,
  0.034,
  0.029,
  0.02906306,
  0.02996344,
  0.0292,
  0.0273099,
  0.0275,
  0.02503347,
  0.0271993,
  0.0266,
  0.0265,
  0.02726001,
  0.02685,
  0.0265,
  0.0268,
  0.0269025,
  0.02852501,
  0.02662222,
  0.02720729,
  0.0259492,
  0.02567084,
  0.0248122,
  0.025123,
  0.024644,
  0.0238,
  0.02408784,
  0.02440999,
  0.02427949,
  0.024021,
  0.02407001,
  0.02427055,
  0.02346,
  0.02274575,
  0.02210346,
  0.0212,
  0.02076246,
  0.02156947,
  0.0213,
  0.02118064,
  0.02085065,
  0.02060162,
  0.01941197,
  0.01783183,
  0.01811,
  0.01816038,
  0.016,
  0.01687994,
  0.0170935,
  0.016696,
  0.01663758,
  0.01619777,
  0.0160149,
  0.01546081,
  0.01501212,
  0.01469499,
  0.01445,
  0.01416607,
  0.016,
  0.01524071,
  0.014998,
  0.01499313,
  0.01497,
  0.01436,
  0.0145,
  0.0135,
  0.01263481,
  0.0118519,
  0.01220291,
  0.01179555,
  0.0117713,
  0.01457129,
  0.01394975,
  0.01517396,
  0.0169575,
  0.015952,
  0.01888341,
  0.02120348,
  0.01891419,
  0.01837705,
  0.01660662,
  0.01534076,
  0.01578865,
  0.01702121,
  0.01630797,
  0.01697012,
  0.01717741,
  0.01928742,
  0.0203,
  0.01962058,
  0.01939301,
  0.01731557,
  0.01740172,
  0.01840138,
  0.01764544,
  0.01723999,
  0.017402,
  0.01740637,
  0.01727272,
  0.0177303,
  0.0206,
  0.022,
  0.01559999,
  0.01760001,
  0.0177798,
  0.01605,
  0.01609146,
  0.01701004,
  0.01865633,
  0.0198699,
  0.01789293,
  0.0168,
  0.0175003,
  0.01927,
  0.02048543,
  0.02748999,
  0.02645733,
  0.02509375,
  0.0251825,
  0.0242558,
  0.02430792,
  0.02225683,
  0.02369875,
  0.02488625,
  0.02466,
  0.02448999,
  0.02422329,
  0.02498978,
  0.02559,
  0.02515339,
  0.0254,
  0.02109999,
  0.0209001
];
var pattern = await predictPattern({ values : closes });
var hs = await hasHeadAndShoulder({ values : closes });
var ihs = await hasInverseHeadAndShoulder({ values : closes });
var db = await hasDoubleBottom({ values : closes });
var dt = await hasDoubleTop({ values : closes });
var tu = await isTrendingUp({ values : closes });
var td = await isTrendingDown({ values : closes });
console.log('Pattern ' , pattern)
console.log('hasHeadAndShoulder ', hs)
console.log('hasInverseHeadAndShoulder ', ihs)
console.log('hasDoubleBottom ' , db)
console.log('hasDoubleTop ' , dt)
console.log('isTrendingUp ' , tu)
console.log('isTrendingDown ' , td)
                            `,
                    fontSize : 12,
                    emptySelectionClipboard:false,
                    formatOnType : true,
                    formatOnPaste : true,
                    parameterHints : true,
                    language: 'typescript'
                });
                window.addEventListener('resize', function () {
                    editor.layout();
                });
            })
    });
	var executeCode = function() {
		var fn = eval('(async function test() {'+editor.getValue()+'})');
		console.log(fn());
	}
</script>
</body>
</html>
