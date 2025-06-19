@extends('adminlte::page')
@section('plugins.Sweetalert2', true)

@section('js')
    <script>
         window.ConfirmaExclusao = function(id) {
            swal.fire({
                title: "Confirma exclusão?",
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Sim',
                denyButtonText: "Não"
            }).then(function(isConfirm) {
                if (isConfirm.value) {
                    let tableDelete = '@yield('table-delete')';
                    let url = "/" + tableDelete + "/" + id + "/destroy";

                    $.get(url, function(data) {
                        swal.fire("Deletado!", "Exclusão Confirmada", "success").then(
                            function(){
                                window.location.reload();
                            }
                        );
                    });
                }
            });
        }
    </script>
@stop()
