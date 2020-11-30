/**
 *
 *  Educational Institution more button
 *
 **/

$('input[type=button]#ei-add-more').cloneData({
    mainContainerId: 'ei-container', // Main container Should be ID
    cloneContainer: 'ei-item', // Which you want to clone
    removeButtonClass: 'remove-ei', // Remove button for remove cloned HTML
    removeConfirm: true, // default true confirm before delete clone item
    removeConfirmMessage: 'Are you sure want to delete?', // confirm delete message
    minLimit: 1, // Default 1 set minimum clone HTML required
    maxLimit: 5, // Default unlimited or set maximum limit of clone HTML
    defaultRender: 1,
    init: function () {
        console.info(':: Initialize Plugin ::');
    },
    beforeRender: function () {
        console.info(':: Before rendered callback called');
    },
    afterRender: function () {
        console.info(':: After rendered callback called');
        //$(".selectpicker").selectpicker('refresh');
    },
    afterRemove: function () {
        console.warn(':: After remove callback called');
    },
    beforeRemove: function () {
        console.warn(':: Before remove callback called');
    }

});
$(document).ready(function () {
    $('.datepicker').datepicker();
});

/**
 *
 *  Employment History more button
 *
 **/

$('input[type=button]#eh-add-more').cloneData({
    mainContainerId: 'eh-container', // Main container Should be ID
    cloneContainer: 'eh-item', // Which you want to clone
    removeButtonClass: 'remove-eh', // Remove button for remove cloned HTML
    removeConfirm: true, // default true confirm before delete clone item
    removeConfirmMessage: 'Are you sure want to delete?', // confirm delete message
    minLimit: 1, // Default 1 set minimum clone HTML required
    maxLimit: 5, // Default unlimited or set maximum limit of clone HTML
    defaultRender: 1,
    init: function () {
        console.info(':: Initialize Plugin ::');
    },
    beforeRender: function () {
        console.info(':: Before rendered callback called');
    },
    afterRender: function () {
        console.info(':: After rendered callback called');
        //$(".selectpicker").selectpicker('refresh');
    },
    afterRemove: function () {
        console.warn(':: After remove callback called');
    },
    beforeRemove: function () {
        console.warn(':: Before remove callback called');
    }
});
$(document).ready(function () {
    $('.datepicker').datepicker();
});