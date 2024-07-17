<?php
if (isset($_POST['download_pdf'])) {
    $pdf_file = $_POST['pdf_file'];
    $pdf_path = 'D:\7th SEM SVVV\Projects\Major Project\Gymsite BB\responsive-website-gym-master\PDF\\' . $pdf_file;

    if (file_exists($pdf_path)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename=' . basename($pdf_path));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($pdf_path));
        readfile($pdf_path);
        exit;
    } else {
        echo "File not found.";
    }
}
?>
