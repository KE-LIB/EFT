function saveClickedItem(item)
{
	document.cookie = "item="+item;
location.reload();
}
 $('.expandContent').click(function(){
        $('.showMe').slideToggle('slow');
    });
	
function getChild(item)
{
	document.cookie = "childItem="+item;

}
 