<?php

class paging extends ado {

    function Page($url, $perpage, $sql, $p) {
        $cnt = $this->count($this->exec($sql));
        if ($cnt > 0) {
            $pageNum = !empty($p) ? $p : 1;
            $pageNum = $pageNum < 1 ? 1 : $pageNum;
            $maxPage = ceil($cnt / $perpage);
            $pageNum = $pageNum > $maxPage ? $maxPage : $pageNum;
            $offset = ($pageNum - 1) * $perpage;
            $sql = $sql . " LIMIT $offset, $perpage ";
            $res = $this->exec($sql);
            //link set
            $pageStart = ($pageNum > 5) ? $pageNum - 5 : 1;
            $pageEnd = ($pageNum > ($maxPage - 5)) ? $maxPage : $pageNum + 5;
            if ($pageNum > 1) {
                $page = 1;
                //$nav[] = " <a href=\"$url&per=$perpage&p=$page\">First</a> ";
                $page = $pageNum - 1;
				$nav[] = "<li><a href=\"$url&per=$perpage&p=$page\"><<</a></li>";
            }

           ($pageNum > 6) ? $nav[] = "<li> <a>...</a> </li>" : "";

            for ($page = $pageStart; $page <= $pageEnd; $page++) {
				 $nav[] = ($page == $pageNum) ? "<li class='active'><a>$page</a></li>" : "<li><a href=\"$url&per=$perpage&p=$page\">" . $page . "</a></li>";
            }

            ($pageNum > ($maxPage - 6)) ? "" : $nav[] = "<li> <a>...</a> </li>";

            if ($pageNum < $maxPage) {
                $page = $pageNum + 1;
				$nav[] = "<li><a href=\"$url&per=$perpage&p=$page\">>></a></li>";
                $page = $maxPage;
                //$nav[] = " <a href=\"$url&per=$perpage&p=$page\">Last</a> ";
            }

            $ref = array($offset + 1, $offset + $perpage, $cnt);

            return array($res, $nav, $ref);
        }
        else
            return;
    }

    function pageRd($url, $perpage, $sql, $p) {
        $cnt = $this->count($this->exec($sql));
        if ($cnt > 0) {
            //resultset
            $pageNum = !empty($p) ? $p : 1;
            $pageNum = $pageNum < 1 ? 1 : $pageNum;
            $maxPage = ceil($cnt / $perpage);
            $pageNum = $pageNum > $maxPage ? $maxPage : $pageNum;
            $offset = ($pageNum - 1) * $perpage;
            $sql = $sql . " LIMIT $offset, $perpage ";

            $res = $this->exec($sql);
            //link set	
            $pageStart = ($pageNum > 5) ? $pageNum - 5 : 1;
            $pageEnd = ($pageNum > ($maxPage - 5)) ? $maxPage : $pageNum + 5;
            if ($pageNum > 1) {
                $page = 1;
                //$nav[] = "<li><a href=\"$url/$perpage/$page.html\">First</a></li>";
                $page = $pageNum - 1;
                $nav[] = "<li><a href=\"$url/$perpage/$page.html\"><<</a></li>";
            }

            ($pageNum > 6) ? $nav[] = "<li> <a>...</a> </li>" : "";

            for ($page = $pageStart; $page <= $pageEnd; $page++) {
                $nav[] = ($page == $pageNum) ? "<li class='active'><a>$page</a></li>" : "<li><a href=\"$url/$perpage/$page.html\">" . $page . "</a></li>";
            }

            ($pageNum > ($maxPage - 6)) ? "" : $nav[] = " <li> <a>...</a> </li>";

            if ($pageNum < $maxPage) {
                $page = $pageNum + 1;
                $nav[] = "<li><a href=\"$url/$perpage/$page.html\">>></a></li>";
                $page = $maxPage;
                //$nav[] = "<li><a href=\"$url/$perpage/$page.html\">Last</a></li>";
            }

            $ref = array($offset + 1, $offset + $perpage, $cnt);

            return array($res, $nav, $ref);
        }
        else
            return;
    }

}

?>