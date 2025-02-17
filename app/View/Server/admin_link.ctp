<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header with-border">
                    <h3 class="card-title"><?= $Lang->get('SERVER__CONFIG_LABEL') ?></h3>
                </div>
                <div class="card-body">

                    <form action="<?= $this->Html->url(['controller' => 'server', 'action' => 'config', 'admin' => true]) ?>"
                          method="post" data-ajax="true">

                        <div class="ajax-msg"></div>

                        <div class="form-group">
                            <label><?= $Lang->get('SERVER__TIMEOUT') ?></label>
                            <input type="text" class="form-control" name="timeout" value="<?= $timeout ?>">
                        </div>

                        <button type="submit" class="btn btn-primary"><?= $Lang->get('GLOBAL__SUBMIT') ?></button>
                        <a href="<?= $this->Html->url(['action' => 'switchState']) ?>"
                           class="btn btn-<?= ($isEnabled) ? 'danger' : 'success' ?>"><?= ($isEnabled) ? $Lang->get('SERVER__DISABLE_SERVER') : $Lang->get('SERVER__ENABLE_SERVER') ?></a>
                        <a href="<?= $this->Html->url(['action' => 'switchCacheState']) ?>"
                           class="btn btn-<?= ($isCacheEnabled) ? 'danger' : 'success' ?>"><?= ($isCacheEnabled) ? $Lang->get('SERVER__DISABLE_CACHE') : $Lang->get('SERVER__ENABLE_CACHE') ?></a>

                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header with-border">
                    <h3 class="card-title"><?= $Lang->get('SERVER__CONFIG_BANNER_MSG') ?></h3>
                </div>
                <div class="card-body">

                    <form action="<?= $this->Html->url(['controller' => 'server', 'action' => 'editBannerMsg', 'admin' => true]) ?>"
                          method="post" data-ajax="true">

                        <div class="ajax-msg"></div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="msg" value="<?= $bannerMsg ?>">
                            <small><?= $Lang->get('CONFIG__LANG_AVAILABLE_VARIABLES') ?> : {ONLINE},
                                {ONLINE_LIMIT}</small>
                        </div>

                        <button type="submit" class="btn btn-primary"><?= $Lang->get('GLOBAL__SUBMIT') ?></button>

                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header with-border">
                    <h3 class="card-title"><?= $Lang->get('SERVER__CONFIG_PLAYER_LIST') ?></h3>
                </div>
                <div class="card-body">
                    <form action="<?= $this->Html->url(['controller' => 'server', 'action' => 'editPlayerList', 'admin' => true]) ?>"
                          method="post" data-ajax="true">

                        <div class="ajax-msg"></div>

                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="player-list-set" name="active" <?= $player_list ? "checked" : "" ?>>
                            <label class="form-check-label" for="player-list-active"><?= $Lang->get("SERVER__PLAYER_LIST_SET") ?></label>
                        </div>

                        <div class="form-group" id="player-list-servers" <?= !$player_list ? 'style="display: none;"' : '' ?>>
                            <label for="server-list-select"><?= $Lang->get("SERVER__PLAYER_LIST_SERVERS") ?></label>
                            <select class="form-control" id="server-list-select" name="server">
                                <?php
                                foreach ($servers as $server) {
                                    if ($server['Server']['type'] != '0')
                                        continue;
                                    ?>
                                    <option value="<?= $server['Server']['id'] ?>" <?= isset($player_list) and $player_list == $server['Server']['id'] ? "selected" : "" ?>>
                                        <?= $server['Server']['name'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary"><?= $Lang->get('GLOBAL__SUBMIT') ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php if (!empty($servers)) { ?>
        <?php foreach ($servers as $key => $value) { ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header with-border">
                            <h3 class="card-title"><?= $Lang->get('SERVER__LINK') ?></h3>
                        </div>
                        <div class="card-body">

                            <form action="<?= $this->Html->url(['controller' => 'server', 'action' => 'link_ajax', 'admin' => true]) ?>"
                                  method="post" data-ajax="true">

                                <div class="ajax-msg"></div>

                                <input type="hidden" name="id" value="<?= $value['Server']['id'] ?>">

                                <div class="form-group">
                                    <label><?= $Lang->get('SERVER__TYPE') ?></label>
                                    <select class="form-control" name="type">
                                        <option value="0"<?= ($value['Server']['type'] == '0') ? ' selected' : '' ?>><?= $Lang->get('SERVER__TYPE_DEFAULT') ?></option>
                                        <option value="1"<?= ($value['Server']['type'] == '1') ? ' selected' : '' ?>><?= $Lang->get('SERVER__TYPE_QUERY') ?></option>
                                        <option value="2"<?= ($value['Server']['type'] == '2') ? ' selected' : '' ?>><?= $Lang->get('SERVER__TYPE_RCON') ?></option>
                                        <option value="3"<?= ($value['Server']['type'] == '3') ? ' selected' : '' ?>><?= $Lang->get('SERVER__TYPE_QUERY_MCPE') ?></option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label><?= $Lang->get('GLOBAL__NAME') ?></label>
                                    <input type="text" class="form-control" name="name"
                                           value="<?= $value['Server']['name'] ?>" placeholder="Ex: MineWeb">
                                </div>

                                <div class="form-group">
                                    <label><?= $Lang->get('SERVER__HOST') ?></label>
                                    <input type="text" class="form-control" name="host"
                                           value="<?= $value['Server']['ip'] ?>" placeholder="Ex: 127.0.0.1">
                                </div>

                                <div class="form-group">
                                    <label><?= $Lang->get('SERVER__PORT') ?></label>
                                    <input type="text" class="form-control" name="port"
                                           value="<?= $value['Server']['port'] ?>" placeholder="Ex: 25565">
                                </div>

                                <?php if ($value['Server']['type'] == '2'): ?>
                                    <div class="form-group">
                                        <label><?= $Lang->get('SERVER__RCON_PORT') ?></label>
                                        <input type="text" class="form-control" name="server_data[rcon_port]"
                                               value="<?= $value['Server']['data']['rcon_port'] ?>"
                                               placeholder="Ex: 25575">
                                    </div>

                                    <div class="form-group">
                                        <label><?= $Lang->get('SERVER__RCON_PASSWORD') ?></label>
                                        <input type="password" class="form-control" name="server_data[rcon_password]"
                                               value="<?= $value['Server']['data']['rcon_password'] ?>"
                                               placeholder="**********">
                                    </div>
                                <?php endif; ?>

                                <button type="submit"
                                        class="btn btn-success"><?= $Lang->get('GLOBAL__SUBMIT') ?></button>
                                <a href="<?= $this->Html->url(['controller' => 'server', 'action' => 'delete', 'admin' => true, $value['Server']['id']]) ?>"
                                   type="submit" class="btn btn-danger"><?= $Lang->get('GLOBAL__DELETE') ?></a>

                                <button class="btn switchBanner float-right <?=  (isset($value['Server']['activeInBanner']) && $value['Server']['activeInBanner']) ? 'btn-danger' : 'btn-info' ?>"
                                        id="<?= $value['Server']['id'] ?>"><?= (isset($value['Server']['activeInBanner']) && $value['Server']['activeInBanner']) ? $Lang->get('SERVER__HIDE_BANNER') : $Lang->get('SERVER__AFFICH_BANNER') ?></button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php } ?>


    <div id="add_server_content"></div>
    <div class="btn btn-success btn-block mb-3" id="add_server"><?= $Lang->get('SERVER__ADD') ?></div>
</section>
<script>

    $('.switchBanner').click(function (e) {
        e.preventDefault();

        var btn = $(this);

        var id = btn.attr('id');

        if (btn.hasClass('btn-danger')) {
            btn.removeClass('btn-danger');
            btn.addClass('btn-info');
            btn.text("<?= $Lang->get('SERVER__AFFICH_BANNER') ?>");
        } else {
            btn.removeClass('btn-info');
            btn.addClass('btn-danger');
            btn.text("<?= $Lang->get('SERVER__HIDE_BANNER') ?>");
        }

        $.get('<?= $this->Html->url(['action' => 'switchBanner']) ?>/' + id);

        return false;
    });

    $('#player-list-set').change(function(event) {
        event.preventDefault();

        if ($(this)[0].checked) {
            $("#player-list-servers").show();
        } else {
            $("#player-list-servers").hide();
        }
    })

    function initSelectInfos() {
        $('select[name="type"]').unbind('change')
        $('select[name="type"]').on('change', function (e) {
            selectInfos($(this))
        })
    }

    $('select[name="type"]').each(function () {
        selectInfos($(this), true)
    })

    function selectInfos(select, init) {
        var type = select.val()

        var infosDiv = select.parent().find('.infos-type')
        if (infosDiv)
            infosDiv.remove()

        if (type == 0) {
            var infos = '<div class="alert alert-info"><?= addslashes($Lang->get('SERVER__TYPE_DEFAULT_INFOS')) ?></div>'
            select.parent().parent().find('input[name="server_data[rcon_port]"]').parent().remove()
            select.parent().parent().find('input[name="server_data[rcon_password]"]').parent().remove()
        } else if (type == 1 || type == 3) {
            var infos = '<div class="alert alert-info"><?= addslashes($Lang->get('SERVER__TYPE_QUERY_INFOS')) ?></div>'
            select.parent().parent().find('input[name="server_data[rcon_port]"]').parent().remove()
            select.parent().parent().find('input[name="server_data[rcon_password]"]').parent().remove()
        } else if (type == 2) {
            var infos = '<div class="alert alert-info"><?= addslashes($Lang->get('SERVER__TYPE_RCON_INFOS')) ?></div>'
            var new_server = '<div class="form-group">';
            new_server += '<label><?= $Lang->get('SERVER__RCON_PORT') ?></label>';
            new_server += '<input type="text" class="form-control" name="server_data[rcon_port]" placeholder="Ex: 25575">';
            new_server += '</div>';
            new_server += '<div class="form-group">';
            new_server += '<label><?= $Lang->get('SERVER__RCON_PASSWORD') ?></label>';
            new_server += '<input type="password" class="form-control" name="server_data[rcon_password]" placeholder="**********">';
            new_server += '</div>';
            if (!init)
                $(new_server).insertBefore($(select.parent().parent().find('button')[0]))
        }

        $('<div class="infos-type"><br>' + infos + '</div>').insertAfter(select)
    }

    var i = 0;
    $("#add_server").click(function () {
        i++;
        var new_server = '<div class="row">';
        new_server += '<div class="col-md-12">';
        new_server += '<div class="card">';
        new_server += '<div class="card-header with-border">';
        new_server += '<h3 class="card-title"><?= $Lang->get('SERVER__LINK') ?></h3>';
        new_server += '</div>';
        new_server += '<div class="card-body">';
        new_server += '<form id="' + i + '" action="<?= $this->Html->url(['controller' => 'server', 'action' => 'link_ajax', 'admin' => true]) ?>" method="post" data-ajax="true">';
        new_server += '<div class="ajax-msg"></div>';
        new_server += '<div class="form-group">';
        new_server += '<label><?= $Lang->get('SERVER__TYPE') ?></label>';
        new_server += '<select class="form-control" name="type">';
        new_server += '<option value="0"><?= $Lang->get('SERVER__TYPE_DEFAULT') ?></option>';
        new_server += '<option value="1"><?= $Lang->get('SERVER__TYPE_QUERY') ?></option>';
        new_server += '<option value="2"><?= $Lang->get('SERVER__TYPE_RCON') ?></option>';
        new_server += '<option value="3"><?= $Lang->get('SERVER__TYPE_QUERY_MCPE') ?></option>';
        new_server += '</select>';
        new_server += '</div>';
        new_server += '<div class="form-group">';
        new_server += '<label><?= $Lang->get('GLOBAL__NAME') ?></label>';
        new_server += '<input type="text" class="form-control" name="name" placeholder="Ex: MineWeb">';
        new_server += '</div>';
        new_server += '<div class="form-group">';
        new_server += '<label><?= $Lang->get('SERVER__HOST') ?></label>';
        new_server += '<input type="text" class="form-control" name="host" placeholder="Ex: 127.0.0.1">';
        new_server += '</div>';
        new_server += '<div class="form-group">';
        new_server += '<label><?= $Lang->get('SERVER__PORT') ?></label>';
        new_server += '<input type="text" class="form-control" name="port" placeholder="Ex: 25565">';
        new_server += '</div>';
        new_server += '<button type="submit" class="btn btn-success"><?= $Lang->get('GLOBAL__SUBMIT') ?></button>';
        new_server += '</form>';
        new_server += '</div>';
        new_server += '</div>';
        new_server += '</div>';
        new_server += '</div>' + "\n";

        $('#add_server_content').append(new_server);

        initForms();
        initSelectInfos();
    });
    initSelectInfos();
</script>
