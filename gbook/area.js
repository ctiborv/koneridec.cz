var smajliku = 0;

function area(text) {
	smajliku++;
	if (smajliku > 10) {
		alert("Zpr�va sm� obsahovat maxim�ln� 10 smajl�k�!");
		return;
	}
        var txtarea = document.post.gbook_zprava;
        text = ' ' + text + ' ';
        if (txtarea.createTextRange && txtarea.caretPos) {
                var caretPos = txtarea.caretPos;
                caretPos.text = caretPos.text.charAt(caretPos.text.length - 1) == ' ' ? caretPos.text + text + ' ' : caretPos.text + text;
                txtarea.focus();
        } else {
                txtarea.value  += text;
                txtarea.focus();
        }
}


function area2(text) {
        var txtarea = document.post.gbook_zprava;
        text = '' + text + '';
        if (txtarea.createTextRange && txtarea.caretPos) {
                var caretPos = txtarea.caretPos;
                caretPos.text = caretPos.text.charAt(caretPos.text.length - 1) == ' ' ? caretPos.text + text + ' ' : caretPos.text + text;
                txtarea.focus();
        } else {
                txtarea.value  += text;
                txtarea.focus();
        }
}



function storeCaret(textEl) {
        if (textEl.createTextRange) textEl.caretPos = document.selection.createRange().duplicate();
}



function CheckForm(Form) {
        var vyplneno = true;

        if ((Form.jmeno.value == "") || (Form.cislo.value == "") || (Form.zprava.value == "")) {
          vyplneno = false;
        }
        
        if (!vyplneno)
          alert("Povinn� pole ozna�en� * mus� b�t v�echna vypln�na!");

        return vyplneno;
}