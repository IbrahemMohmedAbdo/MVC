<?php
function generatePagination($totalPages, $currentPage, $baseUrl)
{
    echo '<nav aria-label="Page navigation example mt-5">
            <ul class="pagination justify-content-center mt-5">';

    
    echo '<li class="page-item ' . ($currentPage <= 1 ? 'disabled' : '') . '">
            <a class="page-link" href="' . $baseUrl . '&page=' . max(1, $currentPage - 1) . '" tabindex="-1" aria-disabled="true">Previous</a>
          </li>';

  
    for ($i = 1; $i <= $totalPages; $i++) {
        echo '<li class="page-item ' . ($currentPage == $i ? 'active' : '') . '">
                <a class="page-link" href="' . $baseUrl . '&page=' . $i . '">' . $i . '</a>
              </li>';
    }

    
    echo '<li class="page-item ' . ($currentPage >= $totalPages ? 'disabled' : '') . '">
            <a class="page-link" href="' . $baseUrl . '&page=' . min($totalPages, $currentPage + 1) . '">Next</a>
          </li>';

    echo '</ul></nav>';
}


$totalPages = 5; 
$currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
$baseUrl = 'index.php?action=list'; 


?>
