@extends('layouts.formulario')

@section('content')
    @error('planejamento_id')
    <div class="alert alert-danger alert-dismissible fade show">
        <strong>{{ $message }}</strong>
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    @enderror
    @include('component.modal_fail')
    <div class="row justify-content-center">
        <div class="col-11">
            <h2 class="titulo_h2 border-bottom" id="expand_dados_solicitacao"><span class="font-weight-bold">Modelo Animal</span></h2>
            <div id="dados_modelo" class="my-2">
                <div class="mb-4">
                    <div class="card shadow-lg p-3 borda-bottom" style="border-radius: 10px 10px 0px 0px;" id="fundo_4">
                        <div class="row">
                            <div class="col-md-12">
                                @if(Auth::user()->tipo_usuario_id == 2)
                                    <h2 class="titulo" id="titulo_4">Dados Base do Modelo Animal <strong
                                            style="color: red">*</strong>
                                        <a class="float-end" id="4_btn_up"><i class="fa-solid fa-circle-chevron-up"></i></a>
                                        <a class="float-end" id="4_btn_down" style="display: none"><i
                                                class="fa-solid fa-circle-chevron-down"></i></a>
                                    </h2>
                                @else
                                    <h2 class="titulo" id="titulo_4">Dados Base do Modelo Animal
                                        <a class="float-end" id="4_btn_up"><i class="fa-solid fa-circle-chevron-up"></i></a>
                                        <a class="float-end" id="4_btn_down" style="display: none"><i
                                                class="fa-solid fa-circle-chevron-down"></i></a>
                                    </h2>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div id="modelo_animal">
                        <div class="card shadow-lg p-3 bg-white" style="border-radius: 0px 0px 10px 10px">
                            <form id="form_modelo_animal_update" method="POST" action="{{route('solicitacao.modelo_animal.update')}}"
                                  enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="modelo_animal_id" value="{{$modelo_animal->id}}">
                                <div class="modal-body">
                                    @include('solicitacao.modelo_animal')
                                    @if(Auth::user()->tipo_usuario_id == 2)
                                        @include('component.botoes_new_form',['tipo'=>4,'avaliacao_id'=>$avaliacao->id,'id'=>$modelo_animal->id])
                                    @elseif(Auth::user()->tipo_usuario_id == 3 && $solicitacao->status == 'avaliado'
                                            && $solicitacao->avaliacao->first()->status == 'aprovadaPendencia')
                                        @include('component.botoes_new_form',['tipo'=>4,'id'=>$modelo_animal->id,'status'=>$avaliacaoModeloAnimal->status])
                                    @else
                                        @include('component.botoes_new_form')
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

            <h2 class="titulo_h2 border-bottom" id="expand_dados_solicitacao"><span class="titulo_spam">Planejamento</span></h2>
            <div id="dados_solicitacao" class="my-2">
                <div class="mb-4">
                    <div class="card shadow-lg p-3 borda-bottom" style="border-radius: 10px 10px 0px 0px;" id="fundo_5">
                        <div class="row">
                            <div class="col-md-12">
                                @if(Auth::user()->tipo_usuario_id == 2)
                                    <h2 class="titulo" id="titulo_5">Dados Base do Planejamento <strong
                                            style="color: red">*</strong>
                                        <a class="float-end" id="5_btn_up"><i class="fa-solid fa-circle-chevron-up"></i></a>
                                        <a class="float-end" id="5_btn_down" style="display: none"><i
                                                class="fa-solid fa-circle-chevron-down"></i></a>
                                    </h2>
                                @else
                                    <h2 class="titulo" id="titulo_5">Dados Base do Planejamento
                                        <a class="float-end" id="5_btn_up"><i class="fa-solid fa-circle-chevron-up"></i></a>
                                        <a class="float-end" id="5_btn_down" style="display: none"><i
                                                class="fa-solid fa-circle-chevron-down"></i></a>
                                    </h2>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div id="planejamento">
                        @if(Auth::user()->tipo_usuario_id == 2)
                            @include('solicitacao.planejamento',['tipo'=>5,'avaliacao_id'=>$avaliacao->id,'id'=>$planejamento->id])
                        @elseif(Auth::user()->tipo_usuario_id == 3 && $solicitacao->status == 'avaliado'
                                && $solicitacao->avaliacao->first()->status == 'aprovadaPendencia')
                            @include('solicitacao.planejamento',['tipo'=>5,'id'=>$planejamento->id,'status'=>$avaliacaoPlanejamento->status])
                        @else
                            @include('solicitacao.planejamento')
                        @endif
                    </div>
                </div>

            </div>

            <h2 class="titulo_h2 border-bottom" id="expand_dados_solicitacao"><span class="titulo_spam">Componentes Conjuntos ao Planejamento</span>
            </h2>

            <div id="dados_solicitacao2" class="my-2">
                <div class="mb-4">
                    <div class="card shadow-lg p-3 borda-bottom" style="border-radius: 10px 10px 0px 0px;" id="fundo_6">
                        <div class="row">
                            <div class="col-md-12">
                                @if(Auth::user()->tipo_usuario_id == 2)
                                    <h2 class="titulo" id="titulo_6">Condição Animal <strong
                                            style="color: red">*</strong>
                                        <a class="float-end" id="6_btn_up"><i
                                                class="fa-solid fa-circle-chevron-down"></i></a>
                                        <a class="float-end" id="6_btn_down" style="display: none"><i
                                                class="fa-solid fa-circle-chevron-up"></i></a>
                                    </h2>
                                @else
                                    <h2 class="titulo" id="titulo_6">Condição Animal
                                        <a class="float-end" id="6_btn_up"><i
                                                class="fa-solid fa-circle-chevron-down"></i></a>
                                        <a class="float-end" id="6_btn_down" style="display: none"><i
                                                class="fa-solid fa-circle-chevron-up"></i></a>
                                    </h2>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div id="condicao_animal" style="display: none;">
                        @if(Auth::user()->tipo_usuario_id == 2)
                            @include('solicitacao.condicoes_animais',['tipo'=>6,'avaliacao_id'=>$avaliacao->id,'id'=>$condicoes_animal->id])
                        @elseif(Auth::user()->tipo_usuario_id == 3 && $solicitacao->status == 'avaliado'
                                && $solicitacao->avaliacao->first()->status == 'aprovadaPendencia')
                            @include('solicitacao.condicoes_animais',['tipo'=>6,'id'=>$condicoes_animal->id,'status'=>$avaliacaoCondicoesAnimal->status])
                        @else
                            @include('solicitacao.condicoes_animais')
                        @endif
                    </div>
                </div>
                <div class="mb-4">
                    <div class="card shadow-lg p-3 borda-bottom" style="border-radius: 10px 10px 0px 0px;" id="fundo_7">
                        <div class="row">
                            <div class="col-md-12">
                                @if(Auth::user()->tipo_usuario_id == 2)
                                    <h2 class="titulo" id="titulo_7">Procedimento <strong style="color: red">*</strong>
                                        <a class="float-end" id="7_btn_up"><i
                                                class="fa-solid fa-circle-chevron-down"></i></a>
                                        <a class="float-end" id="7_btn_down" style="display: none"><i
                                                class="fa-solid fa-circle-chevron-up"></i></a>
                                    </h2>
                                @else
                                    <h2 class="titulo" id="titulo_7">Procedimento
                                        <a class="float-end" id="7_btn_up"><i
                                                class="fa-solid fa-circle-chevron-down"></i></a>
                                        <a class="float-end" id="7_btn_down" style="display: none"><i
                                                class="fa-solid fa-circle-chevron-up"></i></a>
                                    </h2>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div id="procedimento" style="display: none; ">
                        @if(Auth::user()->tipo_usuario_id == 2)
                            @include('solicitacao.procedimento',['tipo'=>7,'avaliacao_id'=>$avaliacao->id,'id'=>$procedimento->id])
                        @elseif(Auth::user()->tipo_usuario_id == 3 && $solicitacao->status == 'avaliado'
                                && $solicitacao->avaliacao->first()->status == 'aprovadaPendencia')
                            @include('solicitacao.procedimento',['tipo'=>7,'id'=>$procedimento->id,'status'=>$avaliacaoProcedimento->status])
                        @else
                            @include('solicitacao.procedimento',['tipo'=>7])
                        @endif
                    </div>
                </div>
                <div class="mb-4">
                    <div class="card shadow-lg p-3 borda-bottom" style="border-radius: 10px 10px 0px 0px;" id="fundo_8">
                        <div class="row">
                            <div class="col-md-12">
                                @if(Auth::user()->tipo_usuario_id == 2)
                                    <h2 class="titulo" id="titulo_8">Cirurgia <strong style="color: red">*</strong>
                                        <a class="float-end" id="8_btn_up"><i
                                                class="fa-solid fa-circle-chevron-down"></i></a>
                                        <a class="float-end" id="8_btn_down" style="display: none"><i
                                                class="fa-solid fa-circle-chevron-up"></i></a>
                                    </h2>
                                @else
                                    <h2 class="titulo" id="titulo_8">Cirurgia
                                        <a class="float-end" id="8_btn_up"><i
                                                class="fa-solid fa-circle-chevron-down"></i></a>
                                        <a class="float-end" id="8_btn_down" style="display: none"><i
                                                class="fa-solid fa-circle-chevron-up"></i></a>
                                    </h2>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div id="operacao" style="display: none; ">
                        @if(Auth::user()->tipo_usuario_id == 2)
                            @include('solicitacao.operacao',['tipo'=>8,'avaliacao_id'=>$avaliacao->id,'id'=>$operacao->id])
                        @elseif(Auth::user()->tipo_usuario_id == 3 && $solicitacao->status == 'avaliado'
                                && $solicitacao->avaliacao->first()->status == 'aprovadaPendencia')
                            @include('solicitacao.operacao',['tipo'=>8,'id'=>$operacao->id,'status'=>$avaliacaoOperacao->status])
                        @else
                            @include('solicitacao.operacao')
                        @endif
                    </div>
                </div>

                <div class="mb-4">
                    <div class="card shadow-lg p-3 borda-bottom" style="border-radius: 10px 10px 0px 0px;" id="fundo_9">
                        <div class="row">
                            <div class="col-md-12">
                                @if(Auth::user()->tipo_usuario_id == 2)
                                    <h2 class="titulo" id="titulo_9">Finalização <strong style="color: red">*</strong>
                                        <a class="float-end" id="9_btn_up"><i
                                                class="fa-solid fa-circle-chevron-down"></i></a>
                                        <a class="float-end" id="9_btn_down" style="display: none"><i
                                                class="fa-solid fa-circle-chevron-up"></i></a>
                                    </h2>
                                @else
                                    <h2 class="titulo" id="titulo_9">Finalização
                                        <a class="float-end" id="9_btn_up"><i
                                                class="fa-solid fa-circle-chevron-down"></i></a>
                                        <a class="float-end" id="9_btn_down" style="display: none"><i
                                                class="fa-solid fa-circle-chevron-up"></i></a>
                                    </h2>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div id="eutanasia" style="display: none;">
                        @if(Auth::user()->tipo_usuario_id == 2)
                            @include('solicitacao.eutanasia',['tipo'=>9,'avaliacao_id'=>$avaliacao->id,'id'=>$eutanasia->id])
                            @include('solicitacao.resultado',['tipo'=>10,'avaliacao_id'=>$avaliacao->id,'id'=>$resultado->id])
                        @elseif(Auth::user()->tipo_usuario_id == 3 && $solicitacao->status == 'avaliado'
                                && $solicitacao->avaliacao->first()->status == 'aprovadaPendencia')
                            @include('solicitacao.eutanasia',['tipo'=>9,'id'=>$eutanasia->id,'status'=>$avaliacaoEutanasia->status])
                            @include('solicitacao.resultado',['tipo'=>10,'id'=>$resultado->id,'status'=>$avaliacaoResultado->status])
                        @else
                            @include('solicitacao.eutanasia')
                            @include('solicitacao.resultado')
                        @endif
                    </div>
                </div>


                <div class="row col-md-10 m-0">
                    <div class="col-4 pl-0">
                        @if(Auth::user()->tipo_usuario_id == 2)
                            <a type="button" class="btn btn-secondary w-100" href="{{ route('avaliador.solicitacao.avaliar', ['solicitacao_id' => $solicitacao->id]) }}">Voltar</a>
                        @elseif(Auth::user()->tipo_usuario_id == 3)
                            <a type="button" class="btn btn-secondary w-100" href="{{ route('solicitacao.index', ['solicitacao_id' => $solicitacao->id]) }}">Voltar</a>
                        @elseif(Auth::user()->tipo_usuario_id == 1 && $solicitacao->status == 'avaliado')
                            <a type="button" class="btn btn-secondary w-100" href="{{ route('solicitacao.admin.apreciacao', ['solicitacao_id' => $solicitacao->id]) }}">Voltar</a>
                        @elseif(Auth::user()->tipo_usuario_id == 1)
                            <a type="button" class="btn btn-secondary w-100" href="{{ route('solicitacao.admin.visualizar', ['solicitacao_id' => $solicitacao->id]) }}">Voltar</a>
                        @endif
                    </div>
                </div>

                <!-- Utilizado para quando houver avaliação -->

                <!-- Modal Pendencia -->
                <div class="modal fade" id="pendenciaModal" tabindex="-1" role="dialog"
                     aria-labelledby="pendenciaModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="titulo_pendencia"></h5>
                                <button type="button" class="close" aria-label="Close" onclick="closeModal()">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="form_troca">
                                <div class="modal-body">
                                    <div class="col-sm-12 mt-2" id="trocaConteudo">

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                            onclick="closeModal()">Fechar
                                    </button>
                                    @if(Auth::user()->tipo_usuario_id == 2)
                                        <button type="button" class="btn btn-success" id="confirmPendencia">Confirmar
                                        </button>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('component.modal_success')

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var avaliado = {{ isset($avaliado) ? $avaliado : 'false' }};
                if (avaliado) {
                    var divsPai = document.querySelectorAll(".DivAporvado");
                    divsPai.forEach(function(divPai) {
                        divPai.innerHTML = "";
                    });
                }
            });
        </script>
        <script type="text/javascript">

            $(document).ready(function () {
                @if(\Illuminate\Support\Facades\Auth::user()->tipo_usuario_id == 2)
                $('#dados_modelo').find('input, textarea, select, button').attr('disabled', 'disabled');
                @endif

                // Modelo Animal
                @if(isset($avaliacaoModeloAnimal) != null )
                alterarCorCard(4, '{{$avaliacaoModeloAnimal->status}}');
                @endif

                // Planejamento
                @if(isset($avaliacaoPlanejamento) != null )
                alterarCorCard(5, '{{$avaliacaoPlanejamento->status}}');
                @endif

                // Condições Animal
                @if(isset($avaliacaoCondicoesAnimal) != null )
                alterarCorCard(6, '{{$avaliacaoCondicoesAnimal->status}}');
                @endif

                // Procedimento
                @if(isset($avaliacaoProcedimento) != null )
                alterarCorCard(7, '{{$avaliacaoProcedimento->status}}');
                @endif

                // Operação
                @if(isset($avaliacaoOperacao) != null )
                alterarCorCard(8, '{{$avaliacaoOperacao->status}}');
                @endif

                // Eutanasia
                @if(isset($avaliacaoEutanasia) != null )
                alterarCorCard(9, '{{$avaliacaoEutanasia->status}}');
                @endif

                // Resultado
                @if(isset($avaliacaoResultado) != null )
                alterarCorCard(10, '{{$avaliacaoResultado->status}}');
                @endif

            });

            // Modelo animal
            $('#4_btn_up').on('click', function () {
                $('#modelo_animal').slideToggle(800);
                $(this).hide();
                $('#4_btn_down').show();
            });

            $('#4_btn_down').on('click', function () {
                $('#modelo_animal').slideToggle(800);
                $(this).hide();
                $('#4_btn_up').show();
            });

            // Planejamento
            $('#5_btn_up').on('click', function () {
                $('#planejamento').slideToggle(800);
                $(this).hide();
                $('#5_btn_down').show();
            });

            $('#5_btn_down').on('click', function () {
                $('#planejamento').slideToggle(800);
                $(this).hide();
                $('#5_btn_up').show();
            });

            // Condições Animal
            $('#6_btn_up').on('click', function () {
                $('#condicao_animal').slideToggle(800);
                $(this).hide();
                $('#6_btn_down').show();
            });

            $('#6_btn_down').on('click', function () {
                $('#condicao_animal').slideToggle(800);
                $(this).hide();
                $('#6_btn_up').show();
            });

            // Procedimento
            $('#7_btn_up').on('click', function () {
                $('#procedimento').slideToggle(800);
                $(this).hide();
                $('#7_btn_down').show();
            });

            $('#7_btn_down').on('click', function () {
                $('#procedimento').slideToggle(800);
                $(this).hide();
                $('#7_btn_up').show();
            });

            // Operação
            $('#8_btn_up').on('click', function () {
                $('#operacao').slideToggle(800);
                $(this).hide();
                $('#8_btn_down').show();
            });

            $('#8_btn_down').on('click', function () {
                $('#operacao').slideToggle(800);
                $(this).hide();
                $('#8_btn_up').show();
            });

            // Eutanasia
            $('#9_btn_up').on('click', function () {
                $('#eutanasia').slideToggle(800);
                $(this).hide();
                $('#9_btn_down').show();
            });

            $('#9_btn_down').on('click', function () {
                $('#eutanasia').slideToggle(800);
                $(this).hide();
                $('#9_btn_up').show();
            });

            // Resultado
            $('#10_btn_up').on('click', function () {
                $('#resultado').slideToggle(800);
                $(this).hide();
                $('#10_btn_down').show();
            });

            $('#10_btn_down').on('click', function () {
                $('#resultado').slideToggle(800);
                $(this).hide();
                $('#10_btn_up').show();
            });

            <!-- Ajax para avaliações individuais -->
            function showAvaliacaoIndividual(tipo, avaliacao_id, id) {

                $("#trocaConteudo").html("");
                $("#titulo_pendencia").html("");

                $.ajax({
                    url: '/avaliacao_individual/' + tipo + '/' + avaliacao_id + '/' + id,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        var ret = "";
                        var status = "reprovado";
                        ret += "<input type=\"hidden\" name=\"avaliacao_id\" value=\"" + avaliacao_id + "\">";
                        ret += "<input type=\"hidden\" name=\"tipo\" value=\"" + tipo + "\">";
                        ret += "<input type=\"hidden\" name=\"id\" value=\"" + id + "\">";

                        ret += "<label for=\"parecer\" > Parecer:<strong style=\"color: red\">*</strong></label>";
                        if (data[0] != null) {
                            ret += "<textarea class=\"form-control\" name=\"parecer\" style=\"height: 200px\" id=\"parecerAval\" autofocus required>" + data[0]['parecer'] + "</textarea>"
                            exist = data[0]['id'];
                        } else {
                            ret += "<textarea class=\"form-control\" name=\"parecer\" style=\"height: 200px\" id=\"parecerAval\" autofocus></textarea>"
                        }

                        $("#trocaConteudo").append(ret);
                        $("#titulo_pendencia").append("Pendência(s) - " + data[1]);

                        @if(Auth::user()->tipo_usuario_id == 2)
                        document.getElementById("confirmPendencia").setAttribute("onClick", "realizarAvaliacaoInd(" + tipo + "," + avaliacao_id + "," + id + ", '" + status + "')");
                        @endif

                        $("#pendenciaModal").modal('show');
                    }
                });
            }

            function closeModal() {
                $("#pendenciaModal").modal('hide');
            }

            function realizarAvaliacaoInd(tipo, avaliacao_id, id, status) {

                if (($("#parecerAval").val() != "" && status == "reprovado") || (status == "aprovado")) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: '{{route('avaliador.avaliacao_ind.realizarAvaliacao')}}',
                        type: 'POST',
                        data: {
                            'tipo': tipo,
                            'avaliacao_id': avaliacao_id,
                            'id': id,
                            'parecer': $("#parecerAval").val(),
                            'status': status
                        },
                        success: function (data) {

                            alterarCorCard(tipo, status);
                            $("#pendenciaModal").modal('hide');
                        }
                    });
                } else {
                    console.log("deu não")
                }
            }

            function alterarCorCard(tipo, status) {
                if (status == "aprovado") {
                    $("#fundo_" + tipo).css({"background-color": "#38c172"});
                } else {
                    $("#fundo_" + tipo).css({"background-color": "#e3342f"});
                }
                $("#titulo_" + tipo).css({"color": "white"});
                $("#" + tipo + "_btn_up").css({"color": "white"});
                $("#" + tipo + "_btn_down").css({"color": "white"});
            }
        </script>
        <script>
            $('#form_modelo_animal_update').submit(function (event) {
                event.preventDefault();

                var formData = new FormData(this);

                $.ajax({
                    type: 'POST',
                    url: '{{ route('solicitacao.modelo_animal.update') }}',
                    data: formData,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'json',
                    success: function (response) {
                        var message = response.message;
                        if (message == 'success') {
                            var campo = response.campo;
                            $('#successModal').modal('show');
                            $('#successModal').find('.msg-success').text('O ' + campo + ' foi salvo com sucesso!');

                            $('.div_error').css('display', 'none');
                            setTimeout(function () {
                                $('#successModal').modal('hide');
                            }, 2000);
                        }
                    },
                    error: function (xhr, status, error) {
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            $('.div_error').css('display', 'none');
                            var errors = xhr.responseJSON.errors;
                            var statusCode = xhr.status;
                            if (statusCode == 422 && status == 'error') {
                                for (var field in errors) {
                                    var fieldErrors = errors[field];
                                    var errorMessage = ''
                                    for (var i = 0; i < fieldErrors.length; i++) {
                                        errorMessage += fieldErrors[i] + '\n';
                                    }
                                    var errorDiv = '#' + field + '_error'
                                    var errorMessageTag = '#' + field + '_error_message';
                                    $(errorMessageTag).html(errorMessage);
                                    $(errorDiv).css('display', 'block')
                                }
                            }
                            if(status == 'error'){
                                $('#failModal').modal('show');
                                $('#failModal').find('.msg-fail').text(xhr.responseJSON.message);
                                setTimeout(function (){
                                    $('#failModal').modal('hide');
                                },2000)
                            }
                        } else {
                            alert("Erro na requisição Ajax: " + error);
                        }
                    }
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $('.download-button').click(function(e) {
                    e.preventDefault();
                    var downloadLink = $(this).attr('href');
                    var verifyLink = $(this).data('path');

                    $.ajax({
                        url: verifyLink,
                        method: 'GET',
                        xhrFields: {
                            responseType: 'blob'
                        },
                        success: function (data) {
                            var a = document.createElement('a');
                            var url = window.URL.createObjectURL(data);
                            a.href = url;
                            a.download = 'arquivo.pdf';
                            document.body.append(a);
                            a.click();
                            a.remove();
                            window.URL.revokeObjectURL(url);
                        },
                        error: function (xhr, status) {

                            if (status == 'error') {
                                $('.modal').hide();
                                $('body').removeClass('modal-open');
                                $('body').css('padding-right', '');
                                $('body').css('overflow', '');
                                $('.modal-backdrop').remove();


                                $('#failModal').modal('show');
                                $('#failModal').find('.msg-fail').text('Arquivo não encontrado, é necessário solicitar o reenvio!');
                                setTimeout(function (){
                                    $('#failModal').modal('hide');

                                },2000)
                            }
                        }
                    });
                });
            });
        </script>

@endsection
