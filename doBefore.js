        INTERMediatorOnPage.doBeforeConstruct = function() {
        INTERMediator.navigationLabel = ["最初へ", null, null, "最後へ", null, null, null, null, false];
        }
        INTERMediatorOnPage.doAfterConstruct = function () {
        if (!INTERMediator.partialConstructing) {
            var context = IMLibContextPool.contextFromName('atmos_list');
            var keys = Object.keys(context.store);
	        var comp = keys[0].split('=');
            var f = IMLibPageNavigation.moveToDetail(comp[0], comp[1], true, false);
            f();
        }
    }

 //   setTimeout("location.reload()",1000*5);

    //プログラム更新時にgit リポジトリから最新版をインストールするボタンを追加
    $(function() {
        var $updateInputs = $("#update-data-form").find("input");
        
        $updateInputs.on("click", function() {
            var result = confirm( "サーバー側のプログラムをアップデートしますか？" );
                if(result){
                    var $this = $(this); 
                    $.ajax({
                    type: "POST",
                    url: "/IM/gitPull.php",
                    data: {
                        id: $this.attr("id")
                    },
                    success: function(html) {
                        alert(html);
                        $this.val("更新完了");
                        location.reload();
                    },
                    error: function(html){
                        alert(html);
                        $this.val("更新失敗 !!!");
                    }
                    })
                    
                }else{
                    console.log(" CANCEL が押された");
                }
            
       });
    });
