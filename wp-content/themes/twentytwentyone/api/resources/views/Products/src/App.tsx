import React from "react";
import {
  Button,
  Container,
  Grid,
  IconButton,
  Paper,
  Table,
  TableBody,
  TableCell,
  TableContainer,
  TableFooter,
  TableHead,
  TablePagination,
  TableRow,
  useTheme,
} from "@mui/material";
import { StyledTitle } from "./App.styles";
import useApp from "./hook";
import KeyboardArrowLeft from "@mui/icons-material/KeyboardArrowLeft";
import KeyboardArrowRight from "@mui/icons-material/KeyboardArrowRight";
import FirstPageIcon from "@mui/icons-material/FirstPage";
import LastPageIcon from "@mui/icons-material/LastPage";
import { Box } from "@mui/system";
import CreateContent from "./components/CreateContent";
import EditContent from "./components/EditContent";

const App = () => {
  /** Hook */
  const {
    contents,
    heads,
    page,
    showModal,
    control,
    typeContents,
    image,
    imgDetails,
    showModalEdit,
    setImage,
    setImageResult,
    handleChangePage,
    handleFirstPageButtonClick,
    handleBackButtonClick,
    handleNextButtonClick,
    handleLastPageButtonClick,
    changeStatus,
    openModal,
    closeModal,
    handleSubmit,
    setValue,
    handleCreateContent,
    handleEditContent,
    reset,
    setShowModalEdit,
    openModalEdit,
    data_edit
  } = useApp();

  const theme = useTheme();

  const ActionsFooter = () => {
    return (
      <>
        <Box sx={{ flexShrink: 0, ml: 2.5 }}>
          <IconButton
            onClick={handleFirstPageButtonClick}
            disabled={page === 0}
            aria-label="first page"
          >
            {theme.direction === "rtl" ? <LastPageIcon /> : <FirstPageIcon />}
          </IconButton>
          <IconButton
            onClick={handleBackButtonClick}
            disabled={page === 0}
            aria-label="previous page"
          >
            {theme.direction === "rtl" ? (
              <KeyboardArrowRight />
            ) : (
              <KeyboardArrowLeft />
            )}
          </IconButton>
          <IconButton
            onClick={handleNextButtonClick}
            disabled={page >= Math.ceil(contents.length / 10) - 1}
            aria-label="next page"
          >
            {theme.direction === "rtl" ? (
              <KeyboardArrowLeft />
            ) : (
              <KeyboardArrowRight />
            )}
          </IconButton>
          <IconButton
            onClick={handleLastPageButtonClick}
            disabled={page >= Math.ceil(contents.length / 10) - 1}
            aria-label="last page"
          >
            {theme.direction === "rtl" ? <FirstPageIcon /> : <LastPageIcon />}
          </IconButton>
        </Box>
      </>
    );
  };

  return (
    <Container maxWidth="xl">
      <StyledTitle>Products content manager</StyledTitle>
      <Grid md={12} style={{ marginBottom: "1rem" }}>
        <Button color="primary" variant="outlined" onClick={openModal}>
          Create content
        </Button>
      </Grid>
      <TableContainer component={Paper}>
        <Table>
          <TableHead>
            <TableRow>
              {heads.map((item: any, index: number) => (
                <TableCell key={index}>{item}</TableCell>
              ))}
            </TableRow>
          </TableHead>
          <TableBody>
            {contents
              .slice(page * 10, page * 10 + 10)
              .map((item: any, index: number) => (
                <TableRow key={index}>
                  <TableCell>{item.id}</TableCell>
                  <TableCell>{item.page.name}</TableCell>
                  <TableCell>{item.section}</TableCell>
                  <TableCell>{item.type_content.name}</TableCell>
                  <TableCell>
                    {item.type_content_id === "1" ? (
                      <span>{item.content}</span>
                    ) : (
                      <img
                        src={item.content}
                        alt="content"
                        style={{ width: 100, height: 100 }}
                      />
                    )}
                  </TableCell>
                  <TableCell>{item.alt}</TableCell>
                  <TableCell>
                    <span
                      onClick={() => changeStatus(item.id)}
                      style={{
                        background: item.status.status_color,
                        padding: 10,
                        borderRadius: 20,
                        color: "#fff",
                        fontWeight: "700",
                        cursor: "pointer",
                      }}
                    >
                      {item.status.name}
                    </span>
                  </TableCell>
                  <TableCell>
                    <td>
                      <button
                        className="btn btn-success"
                        onClick={() => openModalEdit(item)}
                      >
                        Editar
                      </button>
                    </td>
                  </TableCell>
                </TableRow>
              ))}
          </TableBody>
          <TableFooter>
            <TableRow>
              <TablePagination
                rowsPerPageOptions={[5, { label: "All", value: -1 }]}
                colSpan={10}
                count={contents.length}
                rowsPerPage={10}
                page={page}
                SelectProps={{
                  inputProps: {
                    "aria-label": "Rows per page",
                  },
                  native: true,
                }}
                onPageChange={handleChangePage}
                ActionsComponent={ActionsFooter}
              />
            </TableRow>
          </TableFooter>
        </Table>
      </TableContainer>
      <CreateContent
        showModal={showModal}
        closeModal={closeModal}
        handleSubmit={handleSubmit}
        setValue={setValue}
        control={control}
        typeContents={typeContents}
        handleCreateContent={handleCreateContent}
        image={image}
        setImage={setImage}
        setImageResult={setImageResult}
        imgDetails={imgDetails}
      />
      <EditContent
        handleEditContent={handleEditContent}
        reset={reset}
        showModal={showModalEdit}
        closeModal={() => setShowModalEdit(false)}
        setImage={setImage}
        image={image}
        handleSubmit={handleSubmit}
        control={control}
        setImageResult={setImageResult}
        setValue={setValue}
        data_edit={data_edit}
        typeContents={typeContents}
        imgDetails={imgDetails}
        handleCreateContent={handleEditContent}
      />
    </Container>
  );
};

export default App;