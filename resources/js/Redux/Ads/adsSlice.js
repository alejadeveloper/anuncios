import {createSlice, createAsyncThunk} from '@reduxjs/toolkit';
import axios from 'axios';

export const fetchAds = createAsyncThunk('ads/fetchPostsByPackages', async ({search, category, group, sort, page}) => {
    const response = await axios.get(`/api/getAllAds`, {
        params: {
            search: search || '',
            category: category || '',
            group: group || '',
            sort: sort || '',
            page: page || 1,
        }
    });
    return response.data;
});

export const searchAds = createAsyncThunk('posts/searchAds', async ({search, group}) => {
    const response = await axios.get('/api/getAllAds', {params: {search: search, group: group || ''}});
    return response.data;
});

const adsSlice = createSlice({
    name: 'ads',
    initialState: {
        entities: {
            data: [],
            meta: {}
        },
        status: 'idle',
        error: null,
        search: '',
        category: '',
        group: '',
        sort: '',
        page: 1,
    },
    reducers: {
        setSearchTerm: (state, action) => {
            state.search = action.payload;
        },
        setGroup: (state, action) => {
            state.group = action.payload;
        },
    },
    extraReducers: (builder) => {
        builder
            .addCase(fetchAds.pending, (state) => {
                state.status = 'loading';
            })
            .addCase(fetchAds.fulfilled, (state, action) => {
                state.status = 'idle';
                state.entities.data = action.payload.data;
                state.entities.meta = action.payload.meta;
                state.search = action.meta.arg.search;
                state.category = action.meta.arg.category;
                state.group = action.meta.arg.group;
                state.sort = action.meta.arg.sort;
                state.page = action.meta.arg.page;
            })
            .addCase(fetchAds.rejected, (state, action) => {
                state.status = 'idle';
                state.error = action.error;
            })
            .addCase(searchAds.pending, (state) => {
                state.status = 'loading';
            })
            .addCase(searchAds.fulfilled, (state, action) => {
                state.status = 'idle';
                state.entities = action.payload;
                state.search = action.meta.arg.search;
                state.group = action.meta.arg.group;
            })
            .addCase(searchAds.rejected, (state, action) => {
                state.status = 'idle';
                state.error = action.error.message;
            });
    },
});

export const {setSearchTerm, setGroup} = adsSlice.actions;

export default adsSlice.reducer;
