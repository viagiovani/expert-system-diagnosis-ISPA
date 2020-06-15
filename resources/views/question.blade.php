@extends('inc/main')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h4 class ="mt-5" >Jawablah pertanyaan dibawah ini sesuai dengan kondisi tubuh anda..</h4>  
            <p>Jawaban yang anda berikan akan dikalkulasikan menggunakan algoritma naive bayes, 
            <br>untuk mengetahui kemungkinan penyakit ISPA yang anda idap.</p>
            <div class="row">
                <div class="col-10"></div>
                <div class="col-2">
                    <button type="button" id='btnGiveCommand'>Give Command!</button> <span id='message'></span><br><br>
                </div>
            </div>
            <form method="post" action="/submit" class="">
                @csrf
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Pertanyaan</th>
                            <th scope="col">Jawaban</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($question as $q)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$q}}</td>
                            <td>
                                <!-- <input id='chkYes{{$loop->iteration}}' type="checkbox"> Yes
                                <input id='chkNo{{$loop->iteration}}' type="checkbox"> No -->
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="answer{{$loop->iteration}}" id="inlineRadioY{{$loop->iteration}}" value="1">
                                    <label class="form-check-label" for="inlineRadioY{{$loop->iteration}}">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="answer{{$loop->iteration}}" id="inlineRadioN{{$loop->iteration}}" value="0">
                                    <label class="form-check-label" for="inlineRadioN{{$loop->iteration}}">No</label>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <button type="submit"class="btn btn-info">Submit</button>
            </form>

            <script>
                var message = document.querySelector('#message');
                var SpeechRecognition = SpeechRecognition || webkitSpeechRecognition;
                var SpeechGrammarList = SpeechGrammarList || webkitSpeechGrammarList;
                var grammar = '#JSGF V1.0;'
                var recognition = new SpeechRecognition();
                var speechRecognitionList = new SpeechGrammarList();

                speechRecognitionList.addFromString(grammar, 1);
                recognition.grammars = speechRecognitionList;
                recognition.lang = 'bahasa-IND';
                recognition.interimResults = false;
                recognition.onresult = function(event) {
                    var last = event.results.length - 1;
                    var command = event.results[last][0].transcript;
                    message.textContent = 'Voice Input: ' + command + '.';
                    if (command.toLowerCase() === 'yes'){
                        document.querySelector('#inlineRadioY1').checked = true;
                    }else if (command.toLowerCase() === 'no'){
                        document.querySelector('#inlineRadioN1').checked = true;
                    }   
                };
                recognition.onspeechend = function() {
                    recognition.stop();
                };
                recognition.onerror = function(event) {
                    message.textContent = 'Error occurred in recognition: ' + event.error;
                }        
                document.querySelector('#btnGiveCommand').addEventListener('click', function(){
                    recognition.start();
                });
            </script>


        </div>
    </div>
</div>
@endsection