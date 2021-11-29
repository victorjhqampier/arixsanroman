<div>
            <p>On Android devices (I have tested Nexus 5, Nexus 10, Galaxy S4 and Galaxy Tab 3) the window.print() command in javascript doesn't do anything, as far as I can tell it doesn't even register an error.</p>
            <p>I know for a fact that most if not all of these browsers can print because you can use mobile chromes menu to choose "print".  My questions is, why doesn't window.print() trigger the behavior you would expect (opening the clients print menu).
            And is there an Android alternative to window.print()?</p>
        </div>

        
        <input type="button" id="bt"  onclick="print('http://localhost/arixsanroman/restinventario/en_productos_get_ticket/05FB4F64E94E2TzZ1Yy9seHo3Q3ZPd1NVTWJlREhSdz09')" value="Print PDF" />
        
        <script>
            
            
           var print = (doc) => {
                let objFra = document.createElement('iframe');     // Create an IFrame.
                objFra.style.visibility = 'hidden';                // Hide the frame.
                objFra.src = doc;                   // Set source.

                document.body.appendChild(objFra);  // Add the frame to the web page.

                objFra.contentWindow.focus();       // Set focus.
                
                objFra.contentWindow.print(); 
                //objFra.print(); 
                //objFra.remove();      // Print it.
            }



    /*function printPdf(url) {
        var iframe = document.createElement('iframe');
        // iframe.id = 'pdfIframe'
        iframe.className='pdfIframe'
        document.body.appendChild(iframe);
        iframe.style.display = 'none';
        iframe.onload = function () {
            setTimeout(function () {
                iframe.focus();
                iframe.contentWindow.print();
                URL.revokeObjectURL(url)
                // document.body.removeChild(iframe)
            }, 1);
        };
        iframe.src = url;
        // URL.revokeObjectURL(url)
    }*/
        </script>
