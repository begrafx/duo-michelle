    <?php 

//   This program is free software; you can redistribute it and/or modify
//   it under the terms of the GNU General Public License as published by
//   the Free Software Foundation; version 3 of the License.
// 
//   This program is distributed in the hope that it will be useful,
//   but WITHOUT ANY WARRANTY; without even the implied warranty of
//   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//   GNU General Public License for more details.
//
//   http://www.gnu.org/copyleft/gpl.html




	 		 $isbn = str_replace('-', '', $isbn);
       $isbn=rtrim($isbn);
      
       $amznaffiliate='micwesmicsag-20';
       $indieboundaffiliate='MichelleSagara';

       //make sure we have a properly formed isbn10 or isbn13
       if (strlen($isbn)==13) {

          $isbnprefix=substr($isbn, 0, 3);
          $isbnlast10=substr($isbn,3);
          $isbn10first9=substr($isbn, 3, 9);


          //calculate isbn10 checkdigit from isbn13;

          $sum = ( (int)substr($isbnlast10,0,1)*10 + (int)substr($isbnlast10, 1, 1)*9 + (int)substr($isbnlast10, 2, 1)*8

              + (int)substr($isbnlast10, 3, 1)*7 + (int)substr($isbnlast10, 4, 1)*6 + (int)substr($isbnlast10, 5, 1)*5

              + (int)substr($isbnlast10, 6, 1)*4 + (int)substr($isbnlast10, 7, 1)*3 + (int)substr($isbnlast10, 8, 1)*2);


          $checkdigit = 11 - $sum % 11;

          if ($checkdigit==10)

             $checkdigit = 'X';

       }


       else { $isbn10first9 = $isbn; }


  

     $links = 'Find it at  
    <a href="http://www.amazon.com/exec/obidos/ISBN='.$isbn10first9 .''. $checkdigit. '/' . $amznaffiliate . '">Amazon</a> &bull;&nbsp;
    <a href="http://www.chapters.indigo.ca/books/a/' . $isbn . '-item.html">Chapters</a> &bull;
    <a href="http://www.borders.com/online/store/TitleDetail?defaultSearchView=List&sku='.$isbn10first9 .''. $checkdigit.'">Borders</a> &bull;&nbsp;
    <a href="http://www.indiebound.org/book/'.$isbn.'?aff=' . $indieboundaffiliate .'">Indiebound</a> <br />
    <a href="http://www.booksamillion.com/product/'.$isbn.'">Books A Million</a> &bull;&nbsp;
    <a href="http://search.barnesandnoble.com/booksearch/isbninquiry.asp?ean='.$isbn.'">B &amp; N</a> &bull;&nbsp;
    <a href="http://www.powells.com/biblio?isbn='.$isbn.'">Powell&rsquo;s</a>
    &bull;&nbsp;<a href="http://www.bookdepository.co.uk/browse/book/isbn/'.$isbn.'">Book Depository</a> 
    &bull;&nbsp;<a href="http://www.vromansbookstore.com/book/'.$isbn.'">Vroman&rsquo;s</a>';


?>