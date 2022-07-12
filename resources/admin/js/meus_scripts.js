function load_step(){
    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;
    var current = 1;
    var valid = 'yes';
    var steps = $("fieldset").length;
    setProgressBar(current);

    $(".next").click(function(){
        current_fs = $(this).parent();
        next_fs = $(this).parent().next();

        //validacao
        current_fs.find('input').removeClass('is-invalid');
        current_fs.find('label').removeClass('text-danger');
        valid = 'yes';
        current_fs.find('input').each(function(){
            if($(this).prop('required')){
                if($(this).val() == ''){
                    valid = 'no';
                    $(this).addClass('is-invalid');
                    $(this).parent().find('label').addClass('text-danger');
                }
            }
        });
        //valid = 'yes';
        if(valid == 'yes'){
            //Add Class Active
            //save_step(current);
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
                step: function(now) {
                    // for making fielset appear animation
                    opacity = 1 - now;
                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    next_fs.css({'opacity': opacity});
                },
                duration: 500
            });
            setProgressBar(++current);
        }
    });

    $(".previous").click(function(){
        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();
        //Remove class active
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
        //show the previous fieldset
        previous_fs.show();
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function(now) {
                // for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                previous_fs.css({'opacity': opacity});
            },
            duration: 500
        });
        setProgressBar(--current);
    });
    function setProgressBar(curStep){
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        $(".progress-bar").css("width",percent+"%")
    }
}

function copy_text(idd){
    var texto = window.document.getElementById(idd).innerHTML;

    //Cria um elemento input
    var inputofCopy = document.createElement("input");
    inputofCopy.setAttribute("type", "text");
    inputofCopy.setAttribute("id", "temp_"+idd);
    inputofCopy.value = texto;


    //Anexa o elemento ao body
    document.body.appendChild(inputofCopy);

     //seleciona todo o texto do elemento
     inputofCopy.select();
     //executa o comando copy
     document.execCommand('copy');
     

     //remove o elemento
     //console.log(inputofCopy);
     document.body.removeChild(inputofCopy);
     
};


function copy_field(idd){
    window.document.getElementById(idd).select();
    document.execCommand('copy');
    toastr["success"]("Sucesso!", "Copiado para à área de transferência com sucesso");
}



function progressIcon(element, radius, border, backgroundColor, foregroundColor, end, iconClass) {
    // Basic setup
    // ------------------------------
    // Main variables
    var d3Container = d3.select(element),
        startPercent = 0,
        iconSize = 32,
        endPercent = end,
        twoPi = Math.PI * 2,
        formatPercent = d3.format('.0%'),
        boxSize = radius * 2;

    // Values count
    var count = Math.abs((endPercent - startPercent) / 0.01);

    // Values step
    var step = endPercent < startPercent ? -0.01 : 0.01;


    // Create chart
    // ------------------------------

    // Add SVG element
    var container = d3Container.append('svg');

    // Add SVG group
    var svg = container
        .attr('width', boxSize)
        .attr('height', boxSize)
        .append('g')
        .attr('transform', 'translate(' + (boxSize / 2) + ',' + (boxSize / 2) + ')');

    // Construct chart layout
    // ------------------------------
    // Arc
    var arc = d3.svg.arc()
        .startAngle(0)
        .innerRadius(radius)
        .outerRadius(radius - border)
        .cornerRadius(20);

    //
    // Append chart elements
    //

    // Paths
    // ------------------------------

    // Background path
    svg.append('path')
        .attr('class', 'd3-progress-background')
        .attr('d', arc.endAngle(twoPi))
        .style('fill', backgroundColor);

    // Foreground path
    var foreground = svg.append('path')
        .attr('class', 'd3-progress-foreground')
        .attr('filter', 'url(#blur)')
        .style({
            'fill': foregroundColor,
            'stroke': foregroundColor
        });

    // Front path
    var front = svg.append('path')
        .attr('class', 'd3-progress-front')
        .style({
            'fill': foregroundColor,
            'fill-opacity': 1
        });


    // Text
    // ------------------------------

    // Percentage text value
    var numberText = d3.select('.progress-percentage')
        .attr('class', 'mt-15 mb-5');

    // Icon
    d3.select(element)
        .append("i")
        .attr("class", iconClass + " counter-icon")
        .style({
            'color': foregroundColor,
            'top': ((boxSize - iconSize) / 2) + 'px'
        });


    // Animation
    // ------------------------------

    // Animate path
    function updateProgress(progress) {
        foreground.attr('d', arc.endAngle(twoPi * progress));
        front.attr('d', arc.endAngle(twoPi * progress));
        numberText.text(formatPercent(progress));
    }

    // Animate text
    var progress = startPercent;
    (function loops() {
        updateProgress(progress);
        if (count > 0) {
            count--;
            progress += step;
            setTimeout(loops, 10);
        }
    })();
}

function openblocks(fild, value, exception = '') {
    if (value != exception) {
        $(fild).show(50);
    } else {
        $(fild).hide(50);
    }
}

function openblocks_docs(value) {
    if (value == "simple") {
        $(".openthis,.openthisprice").hide(50);
        $(".open_d4sign").hide(50);
    } else if (value == "despachante") {
        $(".open_d4sign,.openthis,.openthisprice").hide(50);
    } else if (value == "word" || value == "pdf") {
        $(".openthis").show(50);
        $(".open_d4sign,.openthisprice").hide(50);
    } else if (value == "declaracao") {
        $(".openthisprice,.openthis").show(50);
    } else if (value == "d4sign") {
        $(".openthis,.openthisprice").hide(50);
        $(".open_d4sign").show(50);
    }
}

function saveClient(form) {
    event.preventDefault();
    var formdata = $(form).serialize();
    var action = $(form).attr('action');
    $.ajax({
        url: action,
        type: "POST",
        data: formdata,
        success: function (str) {
            $('#box-clients').load('/manager-setup/clients/box');
            $('#add-cliente').modal('hide');
            return false;
        }
    });
}

function ajaxSaveClientPicture(client_id, nameImage, token, recebe) {
    var formdata = false;
    if (window.FormData) {
        formdata = new FormData();
    }
    if (formdata) {
        formdata.append("image", nameImage);
        formdata.append("_token", token);
    }
    $.ajax({
        url: '/manager-setup/clients/' + client_id + '/update_image',
        type: "POST",
        data: formdata,
        processData: false,
        contentType: false,
        success: function (str2) {
            //$(recebe).html(str2);
            $(recebe).html('<img src="/storage/clients/' + nameImage + '" width="70" height="70">');
        }
    });
}

function upload_user(obj, action, recebe, folder, client_id) {
    var formdata = false;
    if (window.FormData) {
        formdata = new FormData();
    }
    var i = 0, len = obj.files.length, img, reader, file;
    for (; i < len; i++) {
        file = obj.files[i];
        if (window.FileReader) {
            reader = new FileReader();
            reader.readAsDataURL(file);
        }
        if (formdata) {
            var token = $('meta[name="csrf-token"]').attr('content');
            formdata.append("file", file);
            formdata.append("extra", 'extra-data');
            formdata.append("_token", token);
            formdata.append("folder", folder);
        }
        $.ajax({
            url: action,
            type: "POST",
            data: formdata,
            processData: false,
            contentType: false,
            success: function (str) {
                var nameImage = str.file;
                ajaxSaveClientPicture(client_id, nameImage, token, recebe);
                if (str.success) {
                    toastr["success"]("Sucesso!", str.mesagem);
                } else {
                    toastr["error"]("Error!", str.mesagem);
                }

            }
        });
    }
}

function delform(form, objclick) {
    var action = $('#' + objclick).attr('href');
    $('#' + form).attr('action', action);
    $('#' + form).submit();
}

function upload(obj, action, recebe, folder = '') {
    var formdata = false;
    if (window.FormData) {
        formdata = new FormData();
    }

    var i = 0, len = obj.files.length, img, reader, file;
    for (; i < len; i++) {
        file = obj.files[i];
        if (window.FileReader) {
            reader = new FileReader();
            reader.readAsDataURL(file);
        }
        if (formdata) {
            var token = $('meta[name="csrf-token"]').attr('content');
            formdata.append("file", file);
            formdata.append("extra", 'extra-data');
            formdata.append("_token", token);
            if (folder != '') {
                formdata.append("folder", folder);
            }
            $.ajax({
                url: action,
                type: "POST",
                data: formdata,
                processData: false,
                contentType: false,
                success: function (str) {
                    $('#' + recebe).val(str.file);
                    if (str.success) {
                        toastr["success"]("Sucesso!", str.mesagem);
                    } else {
                        toastr["error"]("Error!", str.mesagem);
                    }

                }
            });

        }
    }

}

function loadQuerent(value) {
    if ($('#querent').val() == '') {
        $('#querent').val(value);
    }
}

function selectAllFilter(idd, formsubmit) {
    $(idd + ' option').prop('selected', true);
    $(formsubmit).submit();
}

function deselectAllFilter(idd, formsubmit) {
    $(idd + ' option').prop('selected', false);
    $(formsubmit).submit();
}

function deselectSatrItem(idd, qtdStar, formsubmit) {
    var values = $(idd).val();
    var new_value = jQuery.grep(values, function (value) {
        return value != qtdStar;
    });
    $(idd).val(new_value);
    $(formsubmit).submit();
}

function deselectSatrFilter(idd, formsubmit) {
    $(idd).val([]);
    $(formsubmit).submit();
}

function addSatrFilter(idd, qtdStar, formsubmit) {
    var values = $(idd).val();
    $(idd).val([]);
    values.push(qtdStar);
    $(idd).val(values);
    $(formsubmit).submit();
}

function removeFilters() {
    console.log('remove filter selected')
}

function swalConfirm(target, type) {
    swal({
            title: "Realmente quer executar esta operação?",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Sim, pode continuar!",
            closeOnConfirm: false
        },
        function () {
            if (type == 'link') {
                location.href = target;
            } else {
                $(target).submit();
            }
        });
}

function swalPrompt(target, starValue, type, title) {
    switch (starValue) {
        case "2":
            swallSelect(target, type, title);
            break;
        default:
            swallInput(target, type, title);
    }
}

function swallInput(target, type, title) {
    swal({
            title: title,
            type: "input",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Enviar!",
            closeOnConfirm: false
        },
        function (inputValue) {
            if (inputValue === false) return false;
            if (inputValue === "") {
                swal.showInputError("Você precisa escrever alguma coisa!");
                return false
            }
            $('#motivoFieldSend').val(inputValue);
            if (type == 'link') {
                location.href = target;
            } else {
                $(target).submit();
            }
        });
}

function swallSelect(target, type, title) {
    swal.fire({
        title: title,
        input: 'select',
        inputOptions: {
            'baixo_interesse': 'Baixo Interesse',
            'custo_alto': 'Custo Alto',
            'prazo_estimado': 'Prazo Estimado',
            'concorrente': 'Concorrente',
            'futuramente': 'Futuramente',
            'curiosidade': 'Curiosidade',
            'encerrado': 'Encerrado',
        },
        inputPlaceholder: 'Selecione uma opção',
        showCancelButton: true,
        cancelButtonText: "Cancelar",
        confirmButtonText: "Enviar",
        inputValidator: (inputValue) => {
            if (inputValue === false) return false;
            if (inputValue === "") {
                swal.showInputError("Você precisa escrever alguma coisa!");
                return false
            }
            $('#motivoFieldSend').val(inputValue);
            if (type == 'link') {
                location.href = target;
            } else {
                $(target).submit();
            }
        }
    });
}

function sizebox_comment() {
    var sizebox = $('.au-consulting-notes-message__note').height();
    $('.au-consulting-notes-message__content').height(sizebox + 30);
}

function habcampoRegister(obj) {
    var elem = obj.closest('.au-consulting-notes-message');
    var box = obj.closest('.au-consulting-notes-message__content');
    var boxSize = $(box).height();
    $(box).css('height', boxSize + 85);
    $(elem).find('.au-consulting-notes-message__edit').removeClass('ng-hide');
}

function cancelcampoRegister(obj) {
    var elem = obj.closest('.au-consulting-notes-message');
    var box = obj.closest('.au-consulting-notes-message__content');
    var boxSize = $(box).height();
    $(box).css('height', boxSize);
    $(elem).find('.au-consulting-notes-message__edit').addClass('ng-hide');
    window.sizebox_comment();
}

function changeInstallments(value) {
    if (value == 'gerencianet') {
        $('#nInstallments').show();
        $('#box_gerencianetId').show();
        $('#max_installments').attr('required', 'required');
    } else {
        $('#nInstallments').hide();
        $('#box_gerencianetId').hide();
        $('#max_installments').removeAttr('required');        
    }
    if(value == 'adexitum'){
        $('.paydatebox').hide();
    }else{
        $('.paydatebox').show();
    }
}


function atualizacep(cep) {
    var s;
    var url;
    cep = cep.replace(/\D/g, "");
    url = "https://viacep.com.br/ws/" + cep + "/json/?callback=correiocontrolcep";
    s = document.createElement('script');
    s.setAttribute('charset', 'utf-8');
    s.src = url;
    document.querySelector('head').appendChild(s);
}

function correiocontrolcep(valor) {
    if (valor.erro) {
        alert('Cep não encontrado');
        return;
    }
    ;
    $('#addressstreet').val(valor.logradouro);
    $('#addressdistrict').val(valor.bairro);
    $('#addresscity').val(valor.localidade);
    $('#addressstate').val(valor.uf);
}


var substringMatcher = function (strs) {
    return function findMatches(q, cb) {
        var matches, substringRegex;
        // an array that will be populated with substring matches
        matches = [];
        // regex used to determine if a string contains the substring `q`
        substrRegex = new RegExp(q, 'i');
        // iterate through the pool of strings and for any string that
        // contains the substring `q`, add it to the `matches` array
        $.each(strs, function (i, str) {
            if (substrRegex.test(str)) {
                // the typeahead jQuery plugin expects suggestions to a
                // JavaScript object, refer to typeahead docs for more info
                matches.push({value: str});
            }
        });
        cb(matches);
    };
};

function submit_marcados(form) {
    var value = '';
    $('.check_item').each(function () {
        if ($(this).is(":checked")) {
            if (value == '') {
                value = $(this).val();
            } else {
                value = value + ',' + $(this).val();
            }
        }
    });
    $('input[name="call_document_id"]').val(value);
    return true;
}


function box_rason_star(qtd_stars){
    var fiels_reason = '';
    var html_base = '';

    if(qtd_stars != 1){
        if($('#button_title').html() == 'Salvar'){
            $('#button_title').html('<svg width="30px" height="40px" viewBox="0 0 30 48"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><path d="M25.5,20.8895495 C24.3246401,20.8895495 23.3684834,20.1715518 23.3684834,19.2891798 C23.3684834,18.4066846 24.3247585,17.6885637 25.5,17.6885637 C26.6753599,17.6885637 27.6315166,18.4066846 27.6315166,19.2891798 C27.6315166,19.8627647 28.1617016,20.3275472 28.8157583,20.3275472 C29.469815,20.3275472 30,19.8627647 30,19.2891798 C30,17.5962726 28.5926472,16.16804 26.6842417,15.7419484 L26.6842417,15.0384906 C26.6842417,14.4649057 26.1540567,14 25.5,14 C24.8459433,14 24.3157583,14.4649057 24.3157583,15.0384906 L24.3157583,15.7419484 C22.4072344,16.16804 21,17.5963958 21,19.2891798 C21,21.3167501 23.0187768,22.9664074 25.5,22.9664074 C26.6753599,22.9664074 27.6315166,23.6844051 27.6315166,24.5669003 C27.6315166,25.4493955 26.6753599,26.1673931 25.5,26.1673931 C24.3246401,26.1673931 23.3684834,25.4492722 23.3684834,24.5669003 C23.3684834,23.9933154 22.8382984,23.5284097 22.1842417,23.5284097 C21.530185,23.5284097 21,23.9933154 21,24.5669003 C21,26.2598075 22.4073528,27.68804 24.3157583,28.1140085 L24.3157583,28.9615094 C24.3157583,29.5350943 24.8459433,30 25.5,30 C26.1540567,30 26.6842417,29.5350943 26.6842417,28.9615094 L26.6842417,28.1140085 C28.5927656,27.68804 30,26.2598075 30,24.5669003 C30,22.53933 27.9812232,20.8895495 25.5,20.8895495" fill="#FFFFFF"></path></g></svg><span class="au-consulting-notes-write__send">Enviar Proposta</span>');
        }
    }
    $('#button_title').show();
    $('.box_esconde').hide();
    $('.verify-required').removeClass('required');

    $('#box_is_claimant').find('.verify-required').addClass('required');
    $('#box_relationship_claimant').find('.verify-required').addClass('required');

    //$('#box_relationship_claimant').find('select').attr('required','required');
    
    
    if(qtd_stars == 1){
        fiels_reason = '<select class="form-control" name="motivo" id="star_reason" autocomplete="off" required>'+
            '<option value="">Selecione</option>'+
            '<option value="Não tem direito">Não tem direito</option>'+
            '<option value="Contato errado">Contato errado</option>'+
        '</select>';
        $('#button_title').html('Salvar');
    }else if(qtd_stars == 2){
        fiels_reason = '<select class="form-control" name="motivo" id="star_reason" autocomplete="off" required>'+
            '<option value="">Selecione</option>'+
            '<option value="custo_alto">Custo Alto</option>'+
            '<option value="prazo_estimado">Prazo Estimado</option>'+
            '<option value="concorrente">Concorrente</option>'+
            '<option value="futuramente">Futuramente</option>'+
            '<option value="curiosidade">Curiosidade</option>'+
        '</select>';

        $('#box_honorary_corrections_quantity').show();
        $('#box_honorary_gender').show();
        $('#box_honorary_amount_honorary').show();
        $('#box_honorary_paymentform').show();
        $('#box_honorary_paydate').show();

        $('#box_honorary_corrections_quantity').find('.verify-required').addClass('required');
        $('#box_honorary_amount_honorary').find('.verify-required').addClass('required');
        $('#box_honorary_paymentform').find('.verify-required').addClass('required');


        $('#box_object_of_action').show();
        $('#box_assets').show();
        $('#box_descendants_quantity').show();
        $('#box_custodian').show();
        $('#box_fixed_food').show();
        $('#box_percentage_food').show();
        $('#box_unemployed_food').show();
        $('#box_ex_spouse_pension').show();
        $('#box_value_of_goods').show();
        $('#box_court_costs').show();
        

    }else if(qtd_stars == 3){
        fiels_reason = '<select class="form-control" name="motivo" id="star_reason" autocomplete="off" required>'+
            '<option value="">Selecione</option>'+
            '<option value="Analisando Honorários">Analisando Honorários</option>'+
            '<option value="Aguardando Documentação">Aguardando Documentação</option>'+
            '<option value="Consultar família">Consultar família</option>'+
            '<option value="Retorno em Breve">Retorno em Breve</option>'+
        '</select>';

        $('#box_honorary_corrections_quantity').show();
        $('#box_honorary_gender').show();
        $('#box_honorary_date_birth').show();
        $('#box_honorary_job').show();
        $('#box_honorary_amount_honorary').show();
        $('#box_honorary_paymentform').show();
        $('#box_honorary_paydate').show();

        $('#box_honorary_corrections_quantity').find('.verify-required').addClass('required');
        $('#box_honorary_amount_honorary').find('.verify-required').addClass('required');
        $('#box_honorary_paymentform').find('.verify-required').addClass('required');

        $('#box_object_of_action').show();
        $('#box_assets').show();
        $('#box_descendants_quantity').show();
        $('#box_custodian').show();
        $('#box_fixed_food').show();
        $('#box_percentage_food').show();
        $('#box_unemployed_food').show();
        $('#box_ex_spouse_pension').show();
        $('#box_value_of_goods').show();
        $('#box_court_costs').show();

    }else if(qtd_stars == 4){
        fiels_reason = '<select class="form-control" name="motivo" id="star_reason" autocomplete="off" required>'+
            '<option value="">Selecione</option>'+
            '<option value="Aguardando Documentação">Aguardando Documentação</option>'+
            '<option value="Consultar família">Consultar família</option>'+
            '<option value="Muito interessado">Muito interessado</option>'+
        '</select>';

        $('#box_honorary_corrections_quantity').show();
        $('#box_honorary_gender').show();
        $('#box_honorary_date_birth').show();
        $('#box_honorary_job').show();
        $('#box_honorary_amount_honorary').show();
        $('#box_honorary_paymentform').show();
        $('#box_honorary_paydate').show();

        $('#box_honorary_corrections_quantity').find('.verify-required').addClass('required');
        $('#box_honorary_amount_honorary').find('.verify-required').addClass('required');
        $('#box_honorary_paymentform').find('.verify-required').addClass('required');
        $('#box_honorary_date_birth').find('.verify-required').addClass('required');
        $('#box_honorary_job').find('.verify-required').addClass('required');

        $('#box_object_of_action').show();
        $('#box_assets').show();
        $('#box_descendants_quantity').show();
        $('#box_custodian').show();
        $('#box_fixed_food').show();
        $('#box_percentage_food').show();
        $('#box_unemployed_food').show();
        $('#box_ex_spouse_pension').show();
        $('#box_value_of_goods').show();
        $('#box_court_costs').show();
    }else if(qtd_stars == 5){
        html_base = '';
        $('#box_honorary_corrections_quantity').show();
        $('#box_honorary_gender').show();
        $('#box_honorary_date_birth').show();
        $('#box_honorary_job').show();
        $('#box_honorary_amount_honorary').show();
        $('#box_honorary_paymentform').show();
        $('#box_honorary_paydate').show();

        $('#box_honorary_corrections_quantity').find('.verify-required').addClass('required');
        $('#box_honorary_amount_honorary').find('.verify-required').addClass('required');
        $('#box_honorary_paymentform').find('.verify-required').addClass('required');
        $('#box_honorary_date_birth').find('.verify-required').addClass('required');
        $('#box_honorary_job').find('.verify-required').addClass('required');

        $('#box_object_of_action').show();
        $('#box_assets').show();
        $('#box_descendants_quantity').show();
        $('#box_custodian').show();
        $('#box_fixed_food').show();
        $('#box_percentage_food').show();
        $('#box_unemployed_food').show();
        $('#box_ex_spouse_pension').show();
        $('#box_value_of_goods').show();
        $('#box_court_costs').show();
    }

    html_base = '<div class="col-sm-12 d-flex">'+
        '<div class="task-list-table f-left pr-1 pt-2 text-grey fs-12 w-50 required">MOTIVO</div>'+
        '<div class="task-list-table f-left w-50">'+
            fiels_reason+
        '</div>'+
    '</div>';

    if(qtd_stars == 5 || qtd_stars == ''){
        html_base = '';
    }
    $('#motivo_star').html(html_base);
}

$(document).ready(function () {
    load_step();   


    $('#crm-rating-star').change(function(){
        var qtd_stars = $(this).val();
        box_rason_star(qtd_stars);
    });

    $('.check_item').click(function () {
        var algum_marcado = 'nao';
        $('.check_item').each(function () {
            if ($(this).is(":checked")) {
                algum_marcado = 'sim';
            }
        });
        if (algum_marcado == 'sim') {
            $('#approve_checked').removeClass('disabled');
            $('#approve_checked').removeAttr('disabled');

            $('#reprove_checked').removeClass('disabled');
            $('#reprove_checked').removeAttr('disabled');

            $('#delete_checked').removeClass('disabled');
            $('#delete_checked').removeAttr('disabled');

        } else {
            $('#approve_checked').addClass('disabled');
            $('#approve_checked').attr('disabled', 'disabled');

            $('#reprove_checked').addClass('disabled');
            $('#reprove_checked').attr('disabled', 'disabled');

            $('#delete_checked').addClass('disabled');
            $('#delete_checked').attr('disabled', 'disabled');
        }
    });

    // Anexar Comprovante
    $(() => {
        $("#upload_link_comprovante").on('click', function (e) {
            e.preventDefault();

            $("#upload_comprovante:hidden").trigger('click');

            $(document).on('change', '#upload_comprovante', () => {

                let nameFile = document.getElementById("upload_comprovante").files;
                let formData = new FormData();

                formData.append('upload_comprovante', nameFile)

                $.ajax({
                    url: "http://ratsbonemagri.local/manager-setup/cases/guide_anexo/22",
                    method: "GET",
                    data: formData,
                    processData: false,
                    success: function (res) {
                        console.log(res);
                    }
                });
            });

        });
    });

    // Anexar Guia
    $(() => {
        $("#upload_link_comprovante").on('click', function (e) {
            e.preventDefault();

            $("#upload_comprovante:hidden").trigger('click');

            $(document).on('change', '#upload_guia', () => {

                let nameFile = document.getElementById("upload_guia").files;
                let formData = new FormData();

                formData.append('upload_comprovante', nameFile)

                $.ajax({
                    url: "http://ratsbonemagri.local/manager-setup/cases/guide_download_anexo/22",
                    method: "POST",
                    data: formData,
                    processData: false,
                    success: function (res) {
                        console.log(res);
                    }
                });
            });

        });
    });
    /*
    $('.slick-triagem').slick({
        dots: true,
        infinite: false,
        speed: 300,
        slidesToShow: 6,
        slidesToScroll: 6,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 5,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }
        ]
    });
    */
    $(".ng-pristine").keyup(function () {
        if ($(this).val() != '') {
            $('.btn-comment-register').removeClass('d-none');
        } else {
            $('.btn-comment-register').addClass('d-none');
        }
    });

    //window.sizebox_comment();
    $(".js-basic-single").select2();

    $('#addresscep').focusout(function () {
        $qtd = $(this).val();
        $qtd = $qtd.replace('-', '');
        if ($qtd.length == 8) {
            atualizacep($qtd);
        }
    });

    $('#step_by_step_clone').cloneya();

    $('.clone-box-01').cloneya().on('before_append.cloneya', function (event, toclone, newclone) {
        $(newclone).find('.money').mask('#.##0,00', {reverse: true});
        $('.money').mask('#.##0,00', {reverse: true});
    });

    $('.clone-box-02').cloneya();

    setTimeout(
        function () {
            window.sizebox_comment();
        }
        , 2000
    );


    var job = [
        'Acabador de Mármore e Granito', 'ACONDICIONADOR', 'Acondicionador', 'Açougueiro', 'Acupunturista', 'Adestrador de Animais',
        'Administrador', 'Administrador de Empresas', 'Administrador de Fazenda', 'Administrador Rural', 'Administrador Financeiro',
        'ADMINISTRADOR RURAL', 'Advogado', 'Aeromodelista', 'Aeronauta', 'Aeroviário', 'Agenciador de Propaganda', 'AGENCIADOR DE PROPAGANDA',
        'Agente Administrativo', 'Agente de Compras e Vendas', 'AGENTE DE COMPRAS/VENDAS', 'Agente de Saúde', 'Agente de Segurança',
        'Agente de Seguros', 'Agente de Serviços Gerais', 'Agente de Turismo', 'Agente de Viagem', 'Agente Funerário', 'Agente Operacional',
        'Agente Penitenciário', 'Agente Publicitário', 'AGENTE VISTOR', 'Agricultor', 'Agrimensor', 'Agrônomo', 'Agropecuarista',
        'Ajudante de Cozinha', 'Ajudante de Eletricista', 'Ajudante de Motorista', 'Ajudante de Padeiro', 'Ajudante de Pedreiro',
        'Ajudante de Pintor', 'Ajudante de Serralheiro', 'Ajudante Geral', 'Ajustador Mecânico', 'Alfaiate', 'Almoxarife', 'Ambulante',
        'Amolador', 'Analista Contábil', 'Analista de Cargos e Salários', 'Analista de Desenvolvimento de Sistemas', 'ANALISTA DE ORG E METODOS',
        'Analista de Organização e Métodos', 'Analista de Recursos Humanos', 'Analista de Suporte', 'Analista de Vendas', 'Analista Financeiro',
        'Analista Químico', 'Anestesista', 'Antenista', 'ANTROPOLOGO', 'Antropólogo', 'Apicultor', 'APICULTOR', 'Apontador', 'Apontador de Mão de Obra',
        'Aposentado', 'Apresentador de TV', 'APRESENTADOR DE TV', 'ARBITRO DESPORTIVO', 'Árbitro Desportivo', 'Armador', 'Armeiro', 'Arqueólogo',
        'ARQUEOLOGO(A)', 'Arquiteto', 'Arquivista de Documentos', 'Arrumador', 'Artesão', 'Artífice', 'Artista', 'Artista Plástico', 'Ascensorista',
        'Assessor', 'Assessor Legislativo', 'Assistente Administrativo', 'Assistente de Filmagem', 'Assistente de Finanças', 'Assistente de Marketing',
        'Assistente de vendas', 'ASSISTENTE JUDICIARIO', 'Assistente Social', 'Assistente Técnico', 'Astrólogo', 'Astrônomo', 'Atendente',
        'Atendente de Enfermagem', 'Atendente de Lanchonete', 'Atendente de Portaria de Hotel', 'Atleta Amador', 'Atleta Profissional', 'Ator',
        'Atuário', 'Auditor', 'Autônomo', 'Autor-Roteirista', 'Auxiliar Administrativo', 'Auxiliar de Almoxarifado', 'Auxiliar de Biblioteca',
        'Auxiliar de cartório', 'Auxiliar de Cobrança', 'Auxiliar de Contabilidade', 'Auxiliar de Cozinha', 'Auxiliar de Dentista',
        'Auxiliar de Enfermagem', 'Auxiliar de Escritório', 'Auxiliar de Estatística', 'Auxiliar de Estoque', 'Auxiliar de Expedição',
        'Auxiliar de Farmácia', 'Auxiliar de Garçom', 'Auxiliar de Laboratório', 'Auxiliar de lavanderia', 'Auxiliar de Limpeza', 'Auxiliar de Manutenção',
        'Auxiliar de maquinista de trem', 'Auxiliar de Marceneiro', 'Auxiliar de Marketing', 'Auxiliar de Mecânico', 'Auxiliar de Montagem',
        'Auxiliar de pessoal', 'Auxiliar de Produção', 'Auxiliar de Radiologia', 'Auxiliar de Serviço Extrajudicial', 'Auxiliar de Serviços Gerais',
        'Auxiliar de Vendas', 'Auxiliar de Veterinário', 'Auxiliar Escolar', 'Auxiliar Financeiro', 'Auxiliar Operacional',
        'Auxiliar Técnico de Informática', 'Auxiliar Técnico de Refrigeração', 'Avaliador', 'Avicultor', 'Azulejista', 'Babá', 'Bailarino',
        'Balanceador', 'Balanceiro', 'Balconista', 'Bancário', 'Banqueiro', 'Barbeiro', 'Barman', 'Bedel', 'Bibliotecário', 'Biólogo', 'Biomédico',
        'BIOQUIMICO', 'Bioquímico', 'Bolsista', 'Bombeiro', 'BORDADEIRA', 'BORDADOR', 'Bordador', 'Borracheiro', 'Botânico', 'Botoeiro', 'Cabeleireiro',
        'Cabineiro', 'Cabista', 'Caixa', 'Caixeiro Viajante', 'CALCADISTA', 'Calceteiro', 'Caldeireiro', 'Camareiro', 'Camelô', 'Caminhoneiro', 'Cantor',
        'Capataz', 'Capitalista', 'CAPITALISTA DE ATIVOS FINANC.', 'Capitalista de Ativos Financeiros', 'Capitão', 'Capoteiro', 'Carcereiro',
        'Carpinteiro', 'CarregadorCarroceiro', 'Carteiro', 'Cartorário', 'Carvoeiro', 'Caseiro', 'Castrador', 'CASTRADOR', 'Catador de Material Reciclável',
        'Cavalariço', 'Ceramista', 'Chacreiro', 'Chapa', 'CHAPEADOR', 'Chapeador', 'Chapeiro', 'Chapista', 'Chaveiro', 'Chefe', 'Chefe de Estação',
        'Chefe de Seção', 'Chefe de Trem', 'Chefe Intermediário', 'Churrasqueiro', 'Cientista', 'Cientista Político', 'CINEASTA', 'Cinegrafista',
        'Circuleiro', 'Cirurgião', 'Cirurgião Dentista', 'Cisterneiro', 'Citotécnico', 'Classificador', 'CLASSIFICADOR', 'Clicheiro', 'Cobrador',
        'cocheiro', 'Colchoeiro', 'Coletor', 'Colocador de Carpetes', 'COLOCADOR DE CARPETES', 'Colunista Social', 'Comandante',
        'Comentarista de Rádio e Televisão', 'COMENTARISTA DE RADIO E TV', 'Comerciante', 'Comerciário', 'Comissário de Polícia', 'Compositor',
        'Comprador', 'Comunicador Visual', 'Comunicólogo', 'COMUNICOLOGO(A)', 'Confeiteiro', 'Conferente', 'Conferente de Carga e Descarga',
        'Conselheiro Tutelar', 'Construtor', 'Consultor', 'Consultor Administrativo', 'Consultor de Empresas', 'Consultor de Informação',
        'Consultor em Remuneração', 'Consultor Fiscal', 'CONSULTOR FISCAL', 'Consultor Jurídico', 'CONSULTOR TECNICO', 'Consultor Técnico',
        'Contabilista', 'Contador', 'Contínuo', 'Contra-regra', 'Contramestre', 'Controlador de Qualidade', 'Coordenador', 'Coordenador Administrativo',
        'Copeiro', 'Cordeiro', 'Coreógrafo', 'Coronel Bombeiro Militar', 'Corretor', 'Corretor de Imóveis', 'Corretor de Seguros',
        'Corretor de Títulos e Valores', 'Cortador', 'Costurador de Lona', 'Costureiro', 'Coveiro', 'Cozinheiro', 'Crediarista', 'Criador',
        'Cronoanalista', 'Dama de Companhia', 'Dançarino', 'Datilógrafo', 'DATILOGRAFO(A)', 'Datiloscopista', 'Decorador', 'Defensor Público',
        'Degustador', 'DEGUSTADOR', 'Delegado de Polícia', 'Demonstrador', 'Dentista', 'Deputado Estadual', 'Deputado Federal', 'DEPUTADO FEDERAL',
        'Desembargador', 'Desempregado', 'Desenhista', 'Desenhista Comercial', 'Desenhista Industrial', 'DESENHISTA TECNICO', 'Desenhista Técnico',
        'Designer', 'Despachante', 'Despachante Policial', 'Desportista Amador', 'Desportista Profissional', 'Detetive', 'Diarista', 'Digitador',
        'Diplomata', 'Diretor', 'Diretor Administrativo', 'Diretor de Cinema', 'Diretor de Empresas', 'Diretor de Escola', 'Diretor de Espetáculos',
        'Diretor de Espetáculos Públicos', 'Diretor de Estabelecimento de Ensino', 'Diretor de Logística', 'Diretor de Serviços',
        'DIRETOR(A) DE EMPRESAS', 'Discotecário', 'Do Comércio', 'DO LAR\DONA DE CASA', 'Doceiro', 'Domador', 'Economiário', 'Economista', 'Editor',
        'Educador', 'Eletricista', 'Eletricista de Automóveis', 'Eletricitário', 'Eletrônico de Manutenção', 'Eletrotécnico', 'Embaixador',
        'Embalador', 'Embalsamador', 'Empacotador', 'Empregado Doméstico', 'Empregado em Transportes e Cargas', 'Empregado Rural', 'EMPREGADO RURAL',
        'Empreiteiro', 'Empresário', 'Empresário Comercial', 'Empresário Industrial', 'Encadernador', 'ENCADERNADOR(A)', 'Encanador',
        'Encanador de Manutenção', 'Encanador Industrial', 'Encarregado', 'Encarregado Administrativo', 'ENCARREGADO DE COMPRAS',
        'Encarregado de Compras', 'ENCARREGADO DE DEPOSITO', 'Encarregado de Depósito', 'ENCARREGADO DE LABORATORIO', 'Encarregado de Laboratório',
        'Encarregado de Manutenção', 'Encarregado de Obras', 'Encarregado de Pintura', 'Encarregado de Produção', 'ENCARREGADO DE REFLORESTAMENTO',
        'Encarregado de Reflorestamento', 'Encarregado do Setor de Tráfego', 'Enfermeiro', 'Enfestador de roupas', 'ENFESTADOR(A)', 'Engenheiro',
        'Engenheiro Agrônomo', 'Engenheiro Civil', 'Engenheiro de Produção', 'Engenheiro Eletricista', 'Engenheiro Eletrônico', 'Engenheiro Florestal',
        'Engenheiro Mecânico', 'Engenheiro Metalúrgico', 'Engenheiro Químico', 'Engraxate', 'Enlonador', 'ENLONADOR', 'Entregador', 'Entregador de Gás',
        'Entregador de Jornal', 'Entregador de Pizza', 'Entrevistador', 'Ervateiro', 'Erveiro', 'Escrevente', 'Escrevente do Serviço Extrajudicial',
        'Escritor', 'Escriturário', 'Escrivão', 'Escrivão de Polícia', 'Escultor', 'ESCULTOR(A)', 'Espelhador', 'Estagiário', 'Estampador', 'Estatístico',
        'Estenógrafo', 'Esteticista', 'Estilista', 'Estivador', 'Estofador', 'Estopador', 'Estoquista', 'Estudante', 'Farmacêutico', 'Farmacologista',
        'Faturista', 'Faxineiro', 'Fazendeiro', 'Feirante', 'Ferramenteiro', 'Ferreiro', 'Ferroviário', 'Fiandeiro', 'Fiel', 'Figurinista', 'Fiscal',
        'Fiscal de Transportes Coletivos', 'Fiscal Rodoviário', 'Físico', 'Fisioterapeuta', 'Fitotecário (Cultiva Plantas)', 'Fitotecário (Informática)',
        'FITOTERAPICO', 'Florista', 'Foguista', 'Fonoaudiólogo', 'Forneiro', 'Fotógrafo', 'Frentista', 'Fresador', 'Freteiro', 'Fruticultor',
        'Funcionário Público Civil', 'Funcionário Público Civil Aposentado', 'Fundidor', 'Funileiro', 'Galvanizador', 'Garagista', 'Garçom', 'Gari',
        'Garimpeiro', 'Gasista', 'Geofísico', 'Geógrafo', 'Geólogo', 'Gerente', 'Gerente Administrativo', 'Gerente Comercial', 'Gerente de Empresa',
        'Gerente de Governança', 'Gerente de Logística', 'Gerente de Mercado', 'Gerente de Mercearia', 'GERENTE DE NEGOCIO', 'Gerente de Negócios',
        'Gerente de Produção', 'Gerente de Vendas', 'Gerente Financeiro', 'Gesseiro', 'GESTOR AMBIENTAL', 'Governador de Estado', 'Governanta',
        'Gráfico', 'Gravador', 'Guarda Florestal', 'Guarda Municipal', 'Guarda Urbano', 'Guarda Vigilante', 'Guardador de Carros', 'Guia Turístico',
        'Guincheiro', 'Historiador', 'Hoteleiro', 'Iluminador', 'Impressor', 'Industrial', 'Industriário', 'Inseminador', 'Inspetor',
        'Inspetor de Qualidade', 'Instalador', 'Instalador de Som', 'Instalador de telefones', 'Instrumentador Cirúrgico', 'Instrumentista',
        'Instrutor', 'Intérprete', 'Inválido', 'Investigador de Polícia', 'Investigador Particular', 'Jardineiro', 'Joalheiro', 'Jogador de Futebol',
        'Jóquei', 'Jornaleiro', 'Jornalista', 'Juiz de Direito', 'Jurista', 'Laboratorista', 'Lacrador de Embalagens', 'Lactarista', 'Ladrilheiro',
        'Laminador', 'Lancheiro', 'Lanterneiro', 'Lapidador', 'Lavadeiro', 'Lavador de Veículos', 'Lavrador', 'Leiloeiro', 'Leiteiro', 'Leiturista',
        'Lenhador', 'Lenheiro', 'Letrista', 'Limpador de vidros', 'Linotipista', 'Lixador', 'Lixeiro', 'Locutor', 'Lustrador', 'Maçariqueiro', 'Madeireiro',
        'Magarefe', 'Maître', 'Manequim', 'Manicure', 'Manobrista', 'Maquilador', 'Maquinista', 'Marceneiro', 'Marinheiro', 'Marítimo', 'Marmiteiro',
        'Marmorista', 'Massagista', 'Masseiro', 'Massoterapeuta', 'Matemático', 'Mecânico', 'Mecânico de Automóvel', 'Mecânico de Manutenção',
        'Mecânico de Precisão', 'Mecânico de Refrigeração', 'Mecânico Eletricista', 'MECANICO(A) ELETRECISTA', 'Mecanógrafo', 'Médico',
        'Médico Veterinário', 'Meio Oficial', 'Membro de Ordem Religiosa', 'Mensageiro', 'Merendeiro', 'Mergulhador', 'Mestre de Obras',
        'Mestre em Produção Industrial', 'Metalúrgico', 'Meteorologista', 'Metroviário', 'Micro-Empresário', 'Militar', 'Militar Reformado',
        'Mineiro', 'Minerador', 'Ministro de Culto Religioso', 'Ministro de Estado', 'Ministro de Tribunal Superior', 'Missionário', 'Modelista',
        'Modelo artístico', 'Modelo de Modas', 'Modista', 'Moldador', 'Monitor', 'Montador', 'Montador de Automóveis', 'Montador de Móveis de Madeira',
        'Mordomo', 'Motoboy', 'Motoqueiro', 'Motorista', 'Motorista de Ambulância', 'Motorista de ônibus urbano', 'Mototaxista', 'Museólogo', 'Músico',
        'Navegador', 'Nutricionista', 'Ocupante de Cargo Político', 'Office-Boy', 'Oficial das Forças Armadas', 'Oficial de Cartório',
        'Oficial de Justiça', 'Oficial Geral', 'Oleiro', 'Operador de Acabamento', 'OPERADOR DE AUDIO', 'Operador de áudio de continuidade (rádio)',
        'Operador de Bombas', 'Operador de Caixa', 'Operador de Caldeira', 'Operador de Câmeras de Cinema e TV', 'OPERADOR DE CAMERAS TV/CINEMA',
        'Operador de ceifadeira', 'Operador de cobrança bancária', 'Operador de Computador', 'Operador de Embalagem', 'Operador de Empilhadeira',
        'Operador de escavadeira', 'Operador de Máquinas', 'Operador de Marketing', 'Operador de Moto Serra', 'Operador de Produção',
        'Operador de Silkscreen', 'Operador de Telecomunicações', 'Operador de Telemarketing', 'Operador de torno automático',
        'Operador de Tráfego', 'Operador de triagem e transbordo', 'OPERADOR DE TRIAGEM/TRASBORDO', 'Operário', 'Ordenador', 'Ordenhador',
        'Orientador educacional', 'Ourives', 'Ouvidor do meio de comunicação', 'Overloquista', 'Padeiro', 'Padre', 'Paisagista', 'Panfleteiro',
        'Pantografista', 'Papeleiro', 'Parlamentar', 'Parteiro', 'Passadeira', 'Pasteleiro', 'Pastor', 'Peão Boiadeiro', 'Pecuarista', 'Pedagogo',
        'Pedicure', 'Pedreiro', 'Peixeiro', 'Peleteiro', 'Pensionista', 'Perfurador de Cartões', 'Perito', 'Perueiro', 'Pescador',
        'Pesquisador Datiloscópico', 'Piloto', 'Pintor', 'Pintor de Automóveis', 'Pintor de Paredes', 'Pipoqueiro', 'Pizzaiolo', 'Plaineiro',
        'Plaqueiro', 'Poceiro', 'Podólogo', 'Poeta', 'Policial Civil', 'Policial Federal', 'Policial Militar', 'POLICIAL MILITAR OUTRO ESTADO',
        'Policial Rodoviário', 'Policial rodoviário Federal', 'Polidor de Metais', 'Polidor de Pedras', 'Polidor de Veículos', 'Porteiro',
        'Praça da aeronáutica', 'Prático de Farmácia', 'Prefeito Municipal', 'Prendas do Lar', 'Prensista', 'Preparador de Máquinas',
        'Preparador do Fumo', 'Presidente da República', 'Procurador', 'Procurador de Justiça', 'Produtor de Espetáculos Públicos',
        'Produtor Musical', 'Produtor Rural', 'Professor', 'Profissional de Artefatos de Couro', 'Profissional de Letras/Artes',
        'Programador', 'PROGRAMADOR CONTROLE PROD', 'Programador de Controle de Produção', 'Projetista', 'Promotor de Eventos',
        'Promotor de Justiça', 'Promotor de Negócios', 'Promotor de Vendas', 'Propagandista', 'Proprietário', 'Prostituta', 'Protético',
        'Protético dentário', 'Psicanalista', 'Psicólogo', 'Publicitário', 'Pugilista', 'Químico', 'Químico industrial', 'Radialista',
        'Radiologista', 'Radiotécnico', 'Radiotelegrafista', 'Raspador', 'Recenseador', 'Recepcionista', 'Recreacionista', 'Redator',
        'Relações Públicas', 'Relojoeiro', 'Repórter', 'Repórter Cinematográfico', 'REPORTER FOTOGRAFICO', 'Repositor', 'Repóter fotográfico',
        'Representante Comercial', 'Restaurador', 'Retificador', 'Retificador de Fieiras', 'Retireiro', 'Revisor', 'Roteirista', 'Sacerdote',
        'Salgadeiro', 'Salineiro', 'Salva - Vidas', 'Sapateiro', 'Secretário', 'Secretário de Estado', 'Secretário Municipal', 'Securitário',
        'Segurança', 'Sem Profissão Definida', 'Senador da República', 'Separador de Sucata', 'Serigrafista', 'Seringueiro', 'Serrador',
        'Serralheiro', 'Servente', 'Servente de Pedreiro', 'Serventuário da Justiça', 'Servidor Público', 'Servidor Público Estadual',
        'Servidor Público Federal', 'Servidor Público Municipal', 'Siderúrgico', 'Síndico', 'Sitiante', 'Sociólogo', 'Soldado do Exército Brasileiro',
        'Soldador', 'Sonoplasta', 'Suinocultor', 'Superintendente', 'Supervisor', 'Supervisor de Produção', 'Supervisor de Segurança',
        'Supervisor de Vendas', 'SUPERVISOR(A) DE TELEMARKETING', 'Tabageiro', 'Tabelião', 'Tanoeiro', 'Tapeceiro', 'Taquígrafo', 'Tatuador',
        'Taxista', 'Tecelão', 'Técnico', 'TECNICO DE AGRIMENSURA', 'Técnico de Copiadora', 'Técnico de Futebol', 'Técnico de Saneamento',
        'Técnico de vendas', 'Técnico em Administração', 'Técnico em Agrimensura', 'Técnico em Agronomia', 'Técnico em Agropecuária',
        'Técnico em Aparelhos Eletrodomésticos', 'Técnico em Biologia', 'Técnico em Bioterismo', 'Técnico em Contabilidade',
        'Técnico em Desportos', 'Técnico em Edificações', 'Técnico em Eletricidade', 'Técnico em Eletrônica', 'Técnico em Enfermagem',
        'Técnico em Engenharia', 'TECNICO EM ENGENHARIA CIVIL', 'Técnico em Estatística', 'Técnico em Farmácia', 'Técnico em Geologia',
        'Técnico em Informática', 'Técnico em Laboratório', 'Técnico em Manutenção', 'Técnico em Mecânica', 'Técnico em Mecânica de Produção',
        'Técnico em Metalurgia', 'Técnico em Mineração', 'Técnico em Nutrição', 'Técnico em Piscicultura', 'Técnico em Plástico',
        'Técnico em Processamento de Dados', 'Técnico em Produção Industrial', 'Técnico em Química', 'Técnico em Radiologia', 'Técnico em Raios X',
        'Técnico em Refrigeração', 'Técnico em Segurança do Trabalho', 'Técnico em Telecomunicações', 'Técnico em Telefonia',
        'Técnico em Veterinária', 'Técnico Fiscal em Arrecadação', 'Técnico Fiscal em Tributação', 'Técnico Industrial', 'Técnico Têxtil',
        'TÉCNICO(A) OPTICO', 'Tecnólogo', 'Telefonista', 'Telegrafista', 'Teletipista', 'Terapeuta Ocupacional', 'Tesoureiro', 'Tintureiro',
        'Tipógrafo', 'Torneiro Ferramenteiro', 'Torneiro Mecânico', 'Trabalhador Agrícola', 'TRABALHADOR CONSTR CIVIL',
        'Trabalhador em Fábrica de Alimentos', 'Trabalhador em Fábrica de Calçados', 'Trabalhador em Fábrica de Papel',
        'Trabalhador em Fábrica Têxteis', 'TRABALHADOR FABR PAPEL', 'Trabalhador na Construção Civil', 'Trabalhador Rural', 'Tradutor',
        'Transportador', 'Trapezista', 'Tratador', 'Tratorista', 'Urbanista', 'Usineiro', 'Vacinador', 'Vaqueiro', 'Varredor de Ruas', 'Vendedor',
        'Verdureiro', 'Vereador', 'Veterinário', 'Viajante', 'Vice-Diretor', 'Vice-Prefeito', 'Vice-Presidente', 'Vidraceiro', 'Vigilante',
        'Vigilante Bancário', 'Vigilante noturno', 'Vimeiro', 'Zelador', 'Zoólogo', 'Zootecnista'
    ];
    $('.typeahead-job').typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        },
        {
            name: 'job',
            displayKey: 'value',
            source: substringMatcher(job)
        });


    var nacionality = [
        'albanês', 'albanesa', 'alemão', 'alemã', 'austríaco', 'austríaca', 'belga', 'belga', 'búlgaro', 'búlgara', 'croata', 'croata',
        'cipriota', 'cipriota', 'dinamarquês', 'dinamarquesa', 'eslovaco', 'eslovaca', 'esloveno', 'eslovena', 'espanhol', 'espanhola',
        'francês', 'francesa', 'finlandês', 'finlandesa', 'grego', 'grega', 'húngaro', 'húngara', 'islandês', 'islandesa', 'irlandês', 'irlandesa',
        'italiano', 'italiana', 'kosovar', 'kosovar', 'lituano', 'lituana', 'luxemburguês', 'luxemburguesa', 'montenegrino', 'montenegrina',
        'holandês', 'holandesa', 'norueguês', 'norueguesa', 'polaco', 'polaca', 'português', 'portuguesa', 'inglês', 'inglesa', 'romenos', 'romena',
        'russo', 'russa', 'sueco', 'sueca', 'suíço', 'suíça', 'turco', 'turca', 'ucraniano', 'ucraniana', 'argentino', 'argentina', 'brasileiro', 'brasileira',
        'canadiano', 'canadiana', 'chileno', 'chilena', 'colombiano', 'colombiana', 'cubano', 'cubana', 'americano', 'americana', 'mexicano', 'mexicana',
        'venezuelano', 'venezuelana', 'afegão', 'afegã', 'chinês', 'chinesa', 'norte-coreano', 'norte-coreana', 'sul-coreano', 'sul-coreana',
        'indiano', 'indiana', 'indoneso', 'indonesa', 'iraniano', 'iraniana', 'iraquiano', 'iraquiana', 'israelita', 'israelita', 'japonês',
        'japonesa', 'jordano', 'jordana', 'libanês', 'libanesa', 'paquistanês', 'paquistanesa', 'sírio', 'síria', 'tailandês', 'tailandesa',
        'timorense', 'timorense', 'vietnamita', 'vietnamita', 'sul-africano', 'sul-africana', 'argelino', 'argelina', 'angolano', 'angolana',
        'cabo-verdiano', 'cabo-verdiana', 'guineense', 'guineense', 'queniano', 'queniana', 'líbio', 'líbia', 'marroquino', 'marroquina',
        'moçambicano', 'moçambicana', 'nigeriano', 'nigeriana', 'ruandês', 'ruandesa', 'santomense', 'santomense', 'senegalês', 'senegalesa',
        'somalí', 'somalí', 'sudanês', 'sudanesa', 'tunisino', 'tunisina', 'australiano', 'australiana', 'neozelandês', 'neozelandesa'
    ];

    $('.typeahead-nacionality').typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        },
        {
            name: 'nacionality',
            displayKey: 'value',
            source: substringMatcher(nacionality)
        });

    var vara = ['Vara Cí­vel', 'Vara de Registros Públicos'];
    $('.typeahead-vara').typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        },
        {
            name: 'vara',
            displayKey: 'value',
            source: substringMatcher(vara)
        });

    var foro = [
        'Foro Regional I - Santana',
        'Foro Regional II - Santo Amaro',
        'Foro Regional III - Jabaquara',
        'Foro Regional IV - Lapa',
        'Foro Regional V - São Miguel Paulista',
        'Foro Regional VI - Penha de França',
        'Foro Regional VII - Itaquera',
        'Foro Regional VIII - Tatuapé',
        'Foro Regional IX - Vila Prudente',
        'Foro Regional X - Ipiranga',
        'Foro Regional XI - Pinheiros',
        'Foro das Execuções Fiscais Estaduais',
        'Foro Especial da Infância e Juventude',
        'Foro Central Juizados Especiais Cí­veis',
        'Foro de Americana',
        'Foro Regional XII - Nossa Senhora do Ó',
        'Setor de Cartas Precatárias Cí­veis - Cap',
        'Foro de Amparo',
        'Foro de Andradina',
        'Foro de Angatuba',
        'Bauru/DEECRIM UR3',
        'Foro de Iacanga',
        'Foro de Aparecida',
        'Foro de Apiaí­',
        'Foro de Araçatuba',
        'Foro de Águas de Lindoia',
        'Foro de Araraquara',
        'Foro de Araras',
        'Foro de Américo Brasiliense',
        'São Paulo/DEECRIM UR1',
        'Foro de Altinópolis',
        'Foro de Arujá',
        'Foro de Assis',
        'Foro de Atibaia',
        'Foro Central Criminal Barra Funda',
        'Foro Central Criminal - Juri',
        'Foro Central - Fazenda Pública/Acidentes',
        'Foro de Agudos',
        'Foro de Bananal',
        'Foro de Auriflama',
        'Foro de Bariri',
        'Foro de Barra Bonita',
        'Foro de Barretos',
        'Foro de Borborema',
        'Foro de Barueri',
        'Foro de Bastos',
        'Foro de Batatais',
        'Foro de Bauru',
        'Foro de Bebedouro',
        'Foro de Avaré',
        'Foro de Bertioga',
        'Foro de Bilac',
        'Foro de Birigui',
        'Foro de Botucatu',
        'Foro de Cabreúva',
        'Foro de Adamantina',
        'Foro de Boituva',
        'Foro de Aguaí',
        'Foro Regional de Vila Mimosa',
        'Foro das Execuções Fiscais Municipais',
        'ANTIGO Foro Distrital de Brás Cubas',
        'Foro de Brodowski',
        'Foro de Brotas',
        'Foro de Buritama',
        'Foro de Bragança Paulista',
        'Foro Central Cível',
        'Foro de Caçapava',
        'Foro de Cachoeira Paulista',
        'Foro de Caconde',
        'Foro de Cafelândia',
        'Foro de Caieiras',
        'Foro de Cajamar',
        'Foro de Cajuru',
        'Foro de Campinas',
        'Foro de Campo Limpo Paulista',
        'Foro de Campos do Jordão',
        'Foro de Cananéia',
        'Foro de Cândido Mota',
        'Foro de Capão Bonito',
        'Foro de Capivari',
        'Foro de Caraguatatuba',
        'Foro de Carapicuíba',
        'Foro de Cardoso',
        'Foro de Casa Branca',
        'Foro de Catanduva',
        'Foro de Cerqueira César',
        'Foro de Cerquilho',
        'Foro de Chavantes',
        'Foro de Colina',
        'Foro de Conchal',
        'Foro de Conchas',
        'Foro de Cordeirópolis',
        'Foro de Cosmópolis',
        'Foro de Cotia',
        'Foro de Cravinhos',
        'São José do Rio Preto/DEECRIM UR8',
        'Foro de Cruzeiro',
        'Foro de Cubatão',
        'Santos/DEECRIM UR7',
        'Foro de Cunha',
        'Foro de Descalvado',
        'Foro de Diadema',
        'Foro de Dois Córregos',
        'Foro de Dracena',
        'Foro de Duartina',
        'Foro de Eldorado Paulista',
        'Foro de Embu das Artes',
        'Foro de Embu-Guaçu',
        'Foro de Espírito Santo do Pinhal',
        'Foro de Estrela D Oeste',
        'Foro de Fartura',
        'Foro de Fernandópolis',
        'Foro de Ferraz de Vasconcelos',
        'Foro de Franca',
        'Foro de Francisco Morato',
        'Foro de Franco da Rocha',
        'Foro de Gália',
        'Foro de Garça',
        'Foro de General Salgado',
        'Foro de Getulina',
        'Foro de Guaíra',
        'Foro de Guará',
        'Foro de Guararapes',
        'Foro de Guararema',
        'Foro de Guaratinguetá',
        'Foro de Guariba',
        'Foro de Guarujá',
        'Foro de Guarulhos',
        'Foro Plantão - 00ª CJ - Capital',
        'Foro de Hortolândia',
        'Foro de Cesário Lange',
        'Foro de Ibaté',
        'Foro de Ibitinga',
        'Foro de Ibiúna',
        'Foro de Iepê',
        'Foro de Igarapava',
        'Foro de Iguape',
        'Foro de Ilha Solteira',
        'Foro de Ilhabela',
        'Foro de Indaiatuba',
        'Foro de Ipauçu',
        'Foro de Ipuã',
        'Foro de Itaberá',
        'Foro de Itaí',
        'Foro de Itajobi',
        'Foro de Itanhaém',
        'Foro de Itapecerica da Serra',
        'Foro de Itapetininga',
        'Foro de Itapeva',
        'Foro de Itapevi',
        'Foro de Itapira',
        'Foro de Itápolis',
        'Foro de Itaporanga',
        'Foro de Itaquaquecetuba',
        'Foro de Itararé',
        'Foro de Itariri',
        'Foro de Itatiba',
        'Foro de Itatinga',
        'Foro de Itirapina',
        'Foro de Itu',
        'Foro de Ituverava',
        'Foro de Jaboticabal',
        'Foro de Jacareí',
        'Foro de Jacupiranga',
        'Foro de Jaguariúna',
        'Foro de Jales',
        'Foro de Jandira',
        'Foro de Jardinópolis',
        'Foro de Jarinu',
        'Foro de Jaú',
        'Foro de José Bonifácio',
        'Foro de Jundiaí',
        'Foro de Junqueirópolis',
        'Foro de Juquiá',
        'Foro de Laranjal Paulista',
        'Foro de Leme',
        'Foro de Lençóis Paulista',
        'Foro de Limeira',
        'Foro de Lins',
        'Foro de Lorena',
        'Foro de Lucélia',
        'Foro de Macatuba',
        'Foro de Macaubal',
        'Foro de Mairinque',
        'Foro de Mairiporã',
        'Foro de Maracaí',
        'Foro de Marília',
        'Foro de Martinópolis',
        'Foro de Matão',
        'Foro de Mauá',
        'Foro de Miguelópolis',
        'Foro de Miracatu',
        'Foro de Mirandópolis',
        'Foro de Mirante do Paranapanema',
        'Foro de Mirassol',
        'Foro de Mococa',
        'Foro de Mogi das Cruzes',
        'Foro de Mogi Guaçu',
        'Foro de Mogi Mirim',
        'Foro de Mongaguá',
        'Foro de Monte Alto',
        'Foro de Monte Aprazível',
        'Foro de Monte Azul Paulista',
        'Foro de Monte Mor',
        'Foro de Morro Agudo',
        'Foro de Neves Paulista',
        'Foro de Nhandeara',
        'Foro de Nova Granada',
        'Foro de Nova Odessa',
        'Foro de Novo Horizonte',
        'Foro de Nuporanga',
        'Foro de Olímpia',
        'Foro de Orlândia',
        'Foro de Osasco',
        'Foro de Osvaldo Cruz',
        'Foro de Ourinhos',
        'Foro de Pacaembu',
        'Foro de Palestina',
        'Foro de Palmeira D Oeste',
        'Foro de Palmital',
        'Foro de Panorama',
        'Foro de Paraguaçu Paulista',
        'Foro de Paraibuna',
        'Foro de Paranapanema',
        'Foro de Pariquera-Açu',
        'Foro de Patrocínio Paulista',
        'Foro de Paulínia',
        'Foro de Paulo de Faria',
        'Foro de Pederneiras',
        'Foro de Pedregulho',
        'Foro de Pedreira',
        'Foro de Penápolis',
        'Foro de Pereira Barreto',
        'Foro de Peruíbe',
        'Foro de Piedade',
        'Foro de Pilar do Sul',
        'Foro de Pindamonhangaba',
        'Foro de Pinhalzinho',
        'Foro de Piquete',
        'Foro de Piracaia',
        'Foro de Piracicaba',
        'Foro de Piraju',
        'Foro de Pirajuí',
        'Foro de Pirapozinho',
        'Foro de Pirassununga',
        'Foro de Piratininga',
        'Foro de Pitangueiras',
        'Foro de Poá',
        'Foro de Pompéia',
        'Foro de Pontal',
        'Foro de Porangaba',
        'Foro de Porto Feliz',
        'Foro de Porto Ferreira',
        'Foro de Potirendaba',
        'Foro de Praia Grande',
        'Foro de Presidente Bernardes',
        'Foro de Presidente Epitácio',
        'Foro de Presidente Prudente',
        'Foro de Presidente Venceslau',
        'Foro de Promissão',
        'Foro de Quatá',
        'Foro de Queluz',
        'Foro de Rancharia',
        'Foro de Regente Feijó',
        'Foro de Registro',
        'Ribeirão Preto/DEECRIM UR6',
        'Foro de Ribeirão Bonito',
        'DEPRE',
        'Campinas/DEECRIM UR4',
        'Foro de Ribeirão Pires',
        'Foro de Ribeirão Preto',
        'Araçatuba/DEECRIM UR2',
        'Foro de Rio Claro',
        'Foro de Rio das Pedras',
        'Foro de Rio Grande da Serra',
        'Foro de Itupeva',
        'Foro de Rosana',
        'Foro de Roseira',
        'São José dos Campos/DEECRIM UR9',
        'Sorocaba/DEECRIM UR10',
        'Foro de Salesópolis',
        'Foro de Salto',
        'Foro de Santana de Parnaíba',
        'Foro Plantão - 41ª CJ - Ribeirão Preto',
        'Foro de Santa Adélia',
        'Foro de Santa Bárbara D Oeste',
        'Foro de Santa Branca',
        'Foro Plantão - 44ª CJ - Guarulhos',
        'Foro Plantão - 01ª CJ - Santos',
        'Foro Plantão - 02ª CJ - São Be. Campo',
        'Foro de Santa Cruz das Palmeiras',
        'Foro de Santa Cruz do Rio Pardo',
        'Foro Plantão - 03ª CJ - Santo André',
        'Foro de Santa Fé do Sul',
        'Foro Plantão - 04ª CJ - Osasco',
        'Foro de Santa Isabel',
        'Foro Plantão - 05ª CJ - Jundiaí',
        'Foro Plantão - 06ª CJ - Brag. Paulista',
        'Foro Plantão - 07ª CJ - Mogi Mirim',
        'Foro de Santa Rita do Passa Quatro',
        'Foro Plantão - 08ª CJ - Campinas',
        'Foro de Santa Rosa de Viterbo',
        'Foro Plantão - 09ª CJ - Rio Claro',
        'Foro Plantão - 10ª CJ - Limeira',
        'Foro Plantão - 11ª CJ - Pirassununga',
        'Foro de Santo Anastácio',
        'Foro de Santo André',
        'Foro Plantão - 12ª CJ - São Carlos',
        'Foro Plantão - 13ª CJ - Araraquara',
        'Foro Plantão - 14ª CJ - Barretos',
        'Foro Plantão - 15ª CJ - Catanduva',
        'Foro Plantão - 16ª CJ - S. J. Rio Preto',
        'Foro Plantão - 17ª CJ - Votuporanga',
        'Foro Plantão - 18ª CJ - Fernandópolis',
        'Foro de Santos', 'Foro de São Bento do Sapucaí',
        'Foro de São Bernardo do Campo',
        'Foro de São Caetano do Sul',
        'Foro de São Carlos',
        'Foro Plantão - 19ª CJ - Sorocaba',
        'Foro de São João da Boa Vista',
        'Foro Plantão - 20ª CJ - Itu',
        'Foro Plantão - 21ª CJ - Registro',
        'Foro Plantão - 22ª CJ - Itapetininga',
        'Foro de São Joaquim da Barra',
        'Foro Plantão - 23ª CJ - Botucatu',
        'Foro Plantão - 24ª CJ - Avaré',
        'Foro de São José do Rio Pardo',
        'Foro de São José do Rio Preto',
        'Foro de São José dos Campos',
        'Foro Plantão - 25ª CJ - Ourinhos',
        'Foro de São Luiz do Paraitinga',
        'Foro Plantão - 26ª CJ - Assis',
        'Foro de São Manuel',
        'Foro de São Miguel Arcanjo',
        'Foro Plantão - 27ª CJ - Pre. Prudente',
        'Foro de São Pedro',
        'Foro Plantão - 28ª CJ - Pre. Venceslau',
        'Foro de São Roque',
        'Foro de São Sebastião',
        'Foro de São Sebastião da Grama',
        'Foro de São Simão',
        'Foro de São Vicente',
        'Foro Plantão - 29ª CJ - Dracena',
        'Foro Plantão - 30ª CJ - Tupã',
        'Foro Plantão - 31ª CJ - Marília',
        'Foro Plantão - 32ª CJ - Bauru',
        'Foro de Serra Negra',
        'Foro de Serrana',
        'Foro de Sertãozinho',
        'Foro Plantão - 33ª CJ - Jaú',
        'Foro Plantão - 34ª CJ - Piracicaba',
        'Foro Plantão - 35ª CJ - Lins',
        'Foro de Socorro',
        'Foro de Sorocaba',
        'Foro Plantão - 36ª CJ - Araçatuba',
        'Foro de Sumaré',
        'Foro Plantão - 37ª CJ - Andradina',
        'Foro de Suzano',
        'Foro de Tabapuã',
        'Foro Plantão - 38ª CJ - Franca',
        'Foro de Taboão da Serra',
        'Foro Plantão - 39ª CJ - Batatais',
        'Foro Plantão - 40ª CJ - Ituverava',
        'Foro Plantão - 42ª CJ - Jaboticabal',
        'Foro Plantão - 43ª CJ - Casa Branca',
        'Foro de Tambaú',
        'Foro de Tanabi',
        'Foro Plantão - 45ª CJ - Mogi das Cruzes',
        'Foro Plantão - 46ª CJ - S. J. dos Campos',
        'Foro Plantão - 47ª CJ - Taubaté',
        'Foro de Taquaritinga',
        'Foro de Taquarituba',
        'Foro Plantão - 48ª CJ - Guaratinguetá',
        'Foro Plantão - 49ª CJ - Itapeva',
        'Foro Plantão - 50ª CJ - S. J. Boa Vista',
        'Foro de Tatuí',
        'Foro de Taubaté',
        'Foro Plantão - 51ª CJ - Caraguatatuba',
        'Foro de Teodoro Sampaio',
        'Foro Plantão - 52ª CJ - Itapec. da Serra',
        'Foro de Tietê',
        'Foro Plantão - 53ª CJ - Americana',
        'Foro Plantão - 54ª CJ - Amparo',
        'Foro Plantão - 55ª CJ - Jales',
        'Foro Plantão - 56ª CJ - Itanhaém',
        'Foro de Tremembé',
        'Foro de Tupã',
        'Foro de Tupi Paulista',
        'Foro de Ubatuba',
        'Foro de Urânia',
        'Foro de Urupês',
        'Foro de Valinhos',
        'Foro de Valparaíso',
        'Foro de Vargem Grande do Sul',
        'Foro de Vargem Grande Paulista',
        'Foro de Várzea Paulista',
        'Foro de Vinhedo',
        'Foro de Viradouro',
        'Foro de Votorantim',
        'Foro de Votuporanga',
        'Foro de Artur Nogueira',
        'Foro de Flórida Paulista',
        'Foro de Louveira',
        'Foro de Buri',
        'Foro de Nazaré Paulista',
        'Foro de Ouroeste',
        'Foro de Pirangi',
        'Foro de Salto de Pirapora',
        'Foro Teste Peticionamento',
        'Foro Regional XV - Butantã',
        'Foro da Comissão Processante Permanente',
        'Presidente Prudente/DEECRIM UR5'
    ];

    $('.typeahead-foro').typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        },
        {
            name: 'foro',
            displayKey: 'value',
            source: substringMatcher(foro)
        });


    /**
     *  Toggle Switch Guias de Casos
     */
    let guiaCaseValue = document.getElementById("guias-case-value");
    if (typeof (guiaCaseValue) != 'undefined' && guiaCaseValue != null) {

        if (guiaCaseValue.value == "Guias Judiciais") {
            $("#guias-judiciais").addClass("show active").show();
            $("#justica-gratuita").hide();
        } else if (guiaCaseValue.value == "Justiça Gratuita") {
            $('#guias-case').attr("checked", true);
            $("#justica-gratuita").addClass("show active").show();
            $("#guias-judiciais").hide();
        } else {
            $("#guias-judiciais").addClass("show active").show();
            $("#justica-gratuita").hide();
        }

        $("#guias-case").on('change', function () {
            if ($(this).is(':checked')) {
                $(this).attr('value', 'true');

                $("#justica-gratuita").addClass("show active").show();
                $("#guias-judiciais").removeClass("show active").hide();

            } else {
                $(this).attr('value', 'false');

                $("#guias-judiciais").addClass("show active").show();
                $("#justica-gratuita").removeClass("show active").hide();
            }
        });
    }

    $(".js-basic-multiple").select2();

    $('.rating-star').barrating({
        theme: 'css-stars',
        showSelectedRating: false
    }); 
});
